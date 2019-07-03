<?php

namespace App\Http\Controllers;
use Modules\Settings\Repositories\Setting\SettingRepository;
use Modules\Alumni\Repositories\Alumni\AlumniRepository;
use App\Http\Requests\ContactFormRequest;
use Mail;
use Modules\Seo\Repositories\Seo\SeoRepository;

class HomeController extends Controller
{
    private $setting;
    private $alumni;
    private $seo;

    public function __construct(
        AlumniRepository $alumni,
        SettingRepository $setting,
        SeoRepository $seo
    )
    {
        $this->alumni = $alumni;
        $this->destinationpath = 'uploads/alumni/';
        $this->setting = $setting;
        $this->seo = $seo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.index')
            ->withSetting($this->setting->getSetting())
            ->withSeo($this->seo->findByField('page', 'home'));
    }

    public function getContacts() 
    {
        return view('layouts.frontend.contacts')
            ->withSetting($this->setting->getSetting())
            ->withSeo($this->seo->findByField('page', 'contact-us'));
    }

    public function getAlumni() 
    {
        return view('layouts.frontend.alumni-form')
            ->withSetting($this->setting->getSetting())
            ->withAlumni($this->alumni->getActiveAndPaginate(4))
            ->withSeo($this->seo->findByField('page', 'alumni form'));
    }

    /**
     * return view for static page
     */
    public function getExtra()
    {
        return view('layouts.frontend.static.extra');
    }

    public function sendMail(ContactFormRequest $request)
    {
        $data = [
            'name' => $request->get('full_name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_message' => $request->get('message')
        ];

        // \Mail::send('email.contact', $data , function($message){
        //     $message->from('dradtechprojectmail@gmail.com');
        //     $message->to('tulsithapa2010@gmail.com', 'Admin')
        //     ->subject('Vs niketan Contact Form Message.');
        // });

        return \Redirect::route('contacts')->with('success_message', 'Thank you for contacting us!');

        $captcha = $request->get('g-recaptcha-response');
        $recaptcha_secret = env('RECAPTCHA_SECRET_KEY');
        $response = $this->curl_load("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $response = json_decode($response);

        if ($response->success == false) {
            return redirect()->back()
                ->withInput()
                ->withWarningMessage("Invalid captcha verification.");
        } else {

            \Mail::send('email.contact', $data , function($message){
                $message->from('dradtechprojectmail@gmail.com');
                $message->to('tulsithapa2010@gmail.com', 'Admin')
                ->subject('Unique Cargo and Courier Contact Form Message.');
            });
    
            return \Redirect::route('contacts')->with('success_message', 'Thank you for contacting us!');
        }
        
    }

    /**
     * Get captcha response.
     */
    private function curl_load($url){

        curl_setopt($ch=curl_init(), CURLOPT_URL, $url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        $response = curl_exec($ch);
    
        curl_close($ch);
    
        return $response;

    }

}
