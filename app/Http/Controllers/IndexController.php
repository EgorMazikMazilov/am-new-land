<?php namespace App\Http\Controllers;

use App\Colors;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mail;
use DB;
use Validator;

class IndexController extends Controller
{

    public function show()
    {
        $colors = Colors::all();
        $data = [
            'colors'=>$colors,
    ];

        return view('site.main', $data);
    }
public function call_me(Request $request){

//
    if ($request->isMethod('post') && $request->call_me == 'call_me') {
        $data = $request->except('_token');
            //dd($data);
            if (isset($data['data-color'])){
                $validator = Validator::make($data,[
                    'name' => 'required|max:255',
                    'tel' => 'required'
                ]);

        if($data['cap']==4){
            $result = Mail::send('site.email_call_me_color', ['data' => $data], function ($message) use ($data) {

                $mail_admin = env('MAIL_ADMIN');
                $message->from('info@avto-mania.com.ua', 'АВТОПИЛОТ лендинг ЗАКАЗ ЗВОНКА');
                $message->to($mail_admin)->subject('Новый заказ звонка с лендинга АВТОПИЛОТ');

            });
        }
        else{
            return redirect()->route('main')->with('status', 'Email not send');
        }

                if ($result) {
                    $name = $data['name'];
                    $phone = $data['tel'];
                    DB::insert('insert into orders (name, phone) values(?,?)', [$name, $phone]);

                    return redirect()->route('main')->with('status', 'Email is send');
                }
        }
        else {
            $validator = Validator::make($data, [
                'name' => 'required|max:255',
                'tel' => 'required'
            ]);
            $result = Mail::send('site.email_call_me', ['data' => $data], function ($message) use ($data) {

                $mail_admin = env('MAIL_ADMIN');
                $message->from('info@avto-mania.com.ua', 'АВТОПИЛОТ лендинг ЗАКАЗ ЗВОНКА');
                $message->to($mail_admin)->subject('Новый заказ звонка с лендинга АВТОПИЛОТ');

            });
            if ($result) {
                $name = $data['name'];
                $phone = $data['tel'];
                DB::insert('insert into orders (name, phone) values(?,?)', [$name, $phone]);

                return redirect()->route('main')->with('status', 'Email is send');
            }
        }
    }
}
    public function sendMail(Request $request)
    {

        if ($request->isMethod('post') && $request->send_small == 'send_small'){
            $data = $request->except('_token');


            $validator = Validator::make($data,[
                'name' => 'required|max:255',
                'phone' => 'required'
            ]);
            if($data['cap'] == 4){
                $result =  Mail::send('site.email_short', ['data'=>$data], function($message) use ($data){
                    $mail_admin = env('MAIL_ADMIN');
                    $message->from('info@avto-mania.com.ua', 'АВТОПИЛОТ лендинг ЗАКАЗ ПОДБОРА');
                    $message->to($mail_admin)->subject('Новый заказ подбора чехлов с лендинга АВТОПИЛОТ');

                });
            }else{
                return redirect()->route('main')->with('status', 'Email not send');
            }

            if ($result) {
                $name = $data['name'];
                $phone = $data['phone'];
                DB::insert('insert into orders (name, phone) values(?,?)', [$name, $phone]);

                return redirect()->route('thanks')->with('status', 'Email is send');
            }
        }
        else{
        if ($request->isMethod('post')) {
            $data = $request->except('_token');

            //validate form data

            $validator = Validator::make($data, [
                'name' => 'required|max:255',
                'secondName' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required',
                'model' => 'required',
                'adress' => 'required',
                'message' => 'required',
            ]);


                //mail send code here
            if($data['cap'] == 3){
                $result =  Mail::send('site.email', ['data'=>$data], function($message) use ($data){
                    $mail_admin = env('MAIL_ADMIN');
                    $message->from('info@avto-mania.com.ua', 'АВТОПИЛОТ лендинг ЗАКАЗ');

                    $message->to($mail_admin)->subject('Новый заказ с лендинга АВТОПИЛОТ');

                });
            }else{
                return redirect()->route('home')->with('status', 'Email not send');
            }


                if ($result) {
                    $name = $data['name'];
                    $secondName = $data['secondName'];
                    $email = $data['email'];
                    $phone = $data['phone'];
                    $model = $data['model'];
                    $adress = $data['adress'];
                    $message = $data['message'];
                    DB::insert('insert into orders (name, second_name, email, phone, model, adress, message) values(?,?,?,?,?,?,?)', [$name, $secondName, $email, $phone, $model, $adress, $message]);

                    return redirect()->route('thanks')->with('status', 'Email is send');
                }
            }
        }
    }
    }
