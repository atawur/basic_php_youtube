<?php

namespace App\Http\Controllers\Students\Exam;

use Illuminate\Http\Request;
use App\Models\Exam\Student;
use App\Models\Exam\SMS;
use App\Models\Exam\SmsTo;
use App\Models\Exam\SmsFormat;
use App\Models\Exam\Mark;
use Auth;
use function GuzzleHttp\json_encode;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSearch(){
        $data['serach_title'] = 'Select Category';
        return view('Student.Exam.sms_search', $data);
    }

    public function postSearch(Request $request){
        $post =  $request->all();
        $where_data = $post;
        unset($where_data['_token']);
        $students = Student::query();
        $students->select('coa_students_id','coa_groups_id','coa_batches_id','coa_classes_id', 'students_mobile_number','coa_student_reg_id','first_name','middle_name','last_name')->with('grade')->with('batch')->with('group');
        foreach($where_data as $key=>$val){
            if (!empty($val)) {
                $students->Where($key,$val);
            }
        }
        $students = $students->get();
        $title = 'Student List';
        $returnHTML = view('Student.Exam.ajax_student_search', compact('post', 'students', 'title'))->render();
        $data['post'] = $post;
        $data['returnHTML'] = $returnHTML;
        return json_encode($data);
    }

    public function getSmsFormat()
    {
        $format = SmsFormat::select('coa_sms_format')
                        ->where('status', '=', 'active')
                        ->first();
        return json_encode($format);
    }

    public function sendSMS(Request $request)
    {
        $post =  $request->all();
        $where_data = $post;
        unset($where_data['_token']);
        $sms_to = SmsTo::where('coa_sms_send_to_id', 1)->value('coa_sms_send_to');
        if (isset($post['coa_students_id']) && !empty($post['coa_students_id'])) {
            $students = Student::selectRaw($sms_to.' as mobile_number, coa_students_id, first_name, last_name, coa_batches_id, coa_classes_id')->whereIn('coa_students_id', $post['coa_students_id'])->get();
        }
        else{
            $students = Student::selectRaw($sms_to.' as mobile_number, coa_students_id, first_name, last_name, coa_batches_id, coa_classes_id')->get();
        }
        //return ($students);
        foreach ($students as $student) {
            $sms_body = $post['sms_body'];
            $sent_sms = $sms_body;
            $url = '';
            $url = 'http://masking.zaman-it.com/smsapi?api_key=C20047195da57db113e198.36281008&type=text@&senderid=8809601000810&msg='.str_replace(' ', '%20', $sms_body).'&contacts='.str_replace('+', '', $student->mobile_number);
            //$url = 'http://api.zaman-it.com/api/sendsms/plain?user=01754624444&password=ABCDab124!@&sender=Friend&SMSText='.str_replace(' ', '%20', $sms_body).'&GSM='.str_replace('+', '', $student->mobile_number);
            if (isset($post['coa_marks_types_id']) && !empty($post['coa_marks_types_id'])) {
                $cutofdate_ex = explode(' - ', $post['date_range']);
                $cutofdate_start = date('Y-m-d', strtotime($cutofdate_ex[0]));
                $cutofdate_end = date('Y-m-d', strtotime($cutofdate_ex[1]));

                $studentFilter = function ($q) use ($post, $student) {
                    $q->where('coa_students_id', $student->coa_students_id);
                };
                
                $studentBatchFilter = function ($q) use ($post, $student) {
                    $q->where('coa_batches_id', $student->coa_batches_id);
                };
                
                $studentClassFilter = function ($q) use ($post, $student) {
                    $q->where('coa_classes_id', $student->coa_classes_id);
                };

                // $obtained_marks_sum = Mark::query();
                // $obtained_marks_sum->whereIn('coa_marks_types_id', $post['coa_marks_types_id'])
                //             ->whereBetween('exam_date', array([$cutofdate_start, $cutofdate_end]))
                //             ->whereHas('student', $studentFilter);
                // if (isset($post['coa_subjects_id']) && !empty($post['coa_subjects_id'])) {
                //     $obtained_marks_sum->where('coa_subjects_id', $post['coa_subjects_id']);
                // }
                // $obtained_marks_sum->sum('obtained_mark');
                $coa_subjects_id = null;
                if (isset($post['coa_subjects_id']) && !empty($post['coa_subjects_id'])) {
                    $coa_subjects_id = $post['coa_subjects_id'];
                }
                $obtained_marks_sum = Mark::when($coa_subjects_id,function($query,$coa_subjects_id) {
                                                    return $query->where('coa_subjects_id',$coa_subjects_id);
                                            })->whereIn('coa_marks_types_id', $post['coa_marks_types_id'])
                                            ->whereBetween('exam_date', array([$cutofdate_start, $cutofdate_end]))
                                            ->whereHas('student', $studentFilter)
                                            ->sum('obtained_mark');

                $total_marks = Mark::when($coa_subjects_id,function($query,$coa_subjects_id) {
                                            return $query->where('coa_subjects_id',$coa_subjects_id);
                                    })->whereIn('coa_marks_types_id', $post['coa_marks_types_id'])
                                    ->whereBetween('exam_date', [$cutofdate_start, $cutofdate_end])
                                    ->whereHas('student', $studentFilter)
                                    ->sum('full_mark');

                $gpa = calculateGpa($obtained_marks_sum, $total_marks);

                $merit_position = Mark::groupBy('coa_students_id')->
                                        when($coa_subjects_id,function($query,$coa_subjects_id) {
                                                return $query->where('coa_subjects_id',$coa_subjects_id);
                                        })
                                        ->orderByRaw('sum(obtained_mark) desc')
                                        ->whereBetween('exam_date', array([$cutofdate_start, $cutofdate_end]))
                                        ->selectRaw('sum(obtained_mark) as sum, coa_students_id')
                                        ->whereIn('coa_marks_types_id', $post['coa_marks_types_id'])
                                        ->whereHas('student', $studentClassFilter)
                                        ->whereRaw('coa_students_id in (SELECT coa_students_id FROM coa_students)')
                                        ->pluck('sum','coa_students_id')->toArray();

                $sms_body = str_replace('{{student_name}}', $student->first_name.' '.$student->last_name, $post['sms_body']);
                $sms_body = str_replace('{{obtained_mark}}', $obtained_marks_sum, $sms_body);
                $sms_body = str_replace('{{full_mark}}', $total_marks, $sms_body);
                $sms_body = str_replace('{{merit_position}}', ordinal(array_search($student->coa_students_id, array_keys((array)$merit_position)) + 1), $sms_body);
                $outof = count($merit_position);
                $sms_body = str_replace('{{total_students}}', $outof, $sms_body);
                $sms_body = str_replace('{{gpa}}', $gpa['grade'], $sms_body);
                $sms_body = str_replace('{{gpa_leter}}', $gpa['letter'], $sms_body);
                $sms_body = str_replace('{{dates}}', $cutofdate_ex[0].' and '.$cutofdate_ex[0], $sms_body);
                $sent_sms = $sms_body;
                $sms_body = str_replace(' ', '%20', $sms_body);
                $url = '';
                $url = 'http://masking.zaman-it.com/smsapi?api_key=C20047195da57db113e198.36281008&type=text@&senderid=8809601000810&msg='.str_replace(' ', '%20', $sms_body).'&contacts='.str_replace('+', '', $student->mobile_number);
                //$url = 'http://api.zaman-it.com/api/sendsms/plain?user=01754624444&password=ABCDab124!@&sender=Friend&SMSText='.$sms_body.'&GSM='.str_replace('+', '', $student->mobile_number).'&type=longSMS';
            }
            $payload = file_get_contents($url);
            echo $payload ;
            exit();
            $data['response'] = $payload;
            $data['msg'] = 'Some SMS could not be sent!!';
            $data['type'] = 'error';
            $data['head'] = 'Error';
            $status = 'Not Sent';
            if (strlen($payload) == 18) {
                $data['msg'] = 'All SMS Sent!!';
                $data['type'] = 'success';
                $data['head'] = 'Success';
                $status = 'Sent';
            }
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => $url,
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_TIMEOUT => 3000,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "GET",
            //     CURLOPT_HTTPHEADER => array(
            //         // Set Here Your Requested Headers
            //         'Content-Type: application/json',
            //     ),
            // ));
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
            // $data['msg'] = 'All SMS Sent!!';
            // $data['type'] = 'success';
            // $data['head'] = 'Success';
            // if ($err) {
            //     $data['response'] = "cURL Error #:" . $err;
            //     $data['msg'] = 'Something went wrong!!';
            //     $data['type'] = 'error';
            //     $data['head'] = 'Error';
            // } else {
            //     $data['response'] = $response;
            // }
            // $error_array = array('5','10','11');
            // if (in_array($response, $error_array)) {
            //     $data['msg'] = 'Something went wrong!!';
            //     $data['type'] = 'error';
            //     $data['head'] = 'Error';
            // }
            $sms = new SMS();
            $sms->coa_students_id = $student->coa_students_id;
            $sms->mobile_number = $student->mobile_number;
            $sms->msg_body = $sent_sms;
            $sms->created_by = Auth::id();
            $sms->status = $status;
            $sms->save();
        }
        $data['post'] = $post;
        return json_encode($data);
    }
}
