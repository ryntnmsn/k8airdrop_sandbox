<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Participant;
use App\Models\Code;
use App\Models\Advertisement;
use App\Models\Subscription;
use App\Models\Banner;
use App\Models\Question;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\API\AdvertisementRepositoryInterface;
use App\Models\Comment;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    //
    private AdvertisementRepositoryInterface $ad;

    /**
     * @param AdvertisementRepositoryInterface $ad
     */
    public function __construct(AdvertisementRepositoryInterface $ad)
    {
        $this->ad = $ad;
    }

    public function index(Request $request) {
        
        $getLocale = (new GetCountryCodeController)->getCountryCode();
       
        $promo = Promo::with('platforms','language')->where([['status', 'Active'], ['is_long_term_post', 'no']])->orderBy('end_date', 'desc');
        $long_term_post = Promo::with('platforms')->where([['is_long_term_post', 'yes'], ['status', 'Active']]);
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $banner_carousel = Banner::with('language')->where('status', 'active');
        $carousels = Carousel::with('language')->where('status', 'active');
        $objectAdd = json_decode(json_encode($ads));

        if(isset($promo)) {
            if($getLocale == 'jp') {
                $promos = $promo->where('language_id', 2)->paginate(6);
            } else {
                $promos = $promo->where('language_id', 1)->paginate(6);
            }
        }
      
        //check for the language
         $this->ip_details();

        return view('index', [
            'promos' => $promos,
            'banners' => $banner_carousel->get(),
            'carousels' => $carousels->get(),
            'long_term_posts' => $long_term_post->get(),
            'advertisements' => $objectAdd->data
            // 'promo_participant' => $promo_participant,
        ]);
    }
    
    public function activePromo() {
        
         $getLocale = (new GetCountryCodeController)->getCountryCode();
        
        $promo = Promo::with('platforms');
        $long_term_post = Promo::with('platforms')->where([['is_long_term_post', 'yes'], ['status', 'Active']]);
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $banner_carousel = Banner::with('language')->where('status', 'active');
        $carousels = Carousel::with('language')->where('status', 'active');
        $objectAdd = json_decode(json_encode($ads));
        if(isset($promo)) {
            if($getLocale == 'jp') {
                $is_not_banner = $promo->where([['status', 'Active'], ['language_id', 2]])->orderBy('start_date', 'desc')->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->where('is_long_term_post', 'no')->paginate(6);
            } else {
                 $is_not_banner = $promo->where([['status', 'Active'], ['language_id', 1]])->orderBy('start_date', 'desc')->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->where('is_long_term_post', 'no')->paginate(6);
            }
        }


        //check for the language
         $this->ip_details();

        return view('index', [
            'promos' => $is_not_banner,
            'banners' => $banner_carousel->get(),
            'long_term_posts' => $long_term_post->get(),
            'advertisements' => $objectAdd->data,
            'carousels' => $carousels->get(),
            // 'promo_participant' => $promo_participant,
        ]);
    }
    
    
    public function endedPromo() {
        
        $getLocale = (new GetCountryCodeController)->getCountryCode();
        
        $promo = Promo::with('platforms');
        $long_term_post = Promo::with('platforms')->where([['is_long_term_post', 'yes'], ['status', 'Active']]);
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $banner_carousel = Banner::with('language')->where('status', 'active');
        $carousels = Carousel::with('language')->where('status', 'active');
        $objectAdd = json_decode(json_encode($ads));
        if(isset($promo)) {
            
            if($getLocale == 'jp') {
            
                 $is_not_banner = $promo->where([['status', 'Active'], ['language_id', 2]])->orderBy('start_date', 'desc')->where('end_date', '<', Carbon::now()->format('Y-m-d'))->where('is_long_term_post', 'no')->paginate(6);
            }else {
                $is_not_banner = $promo->where([['status', 'Active'], ['language_id', 1]])->orderBy('start_date', 'desc')->where('end_date', '<', Carbon::now()->format('Y-m-d'))->where('is_long_term_post', 'no')->paginate(6);
            }
        }

        //check for the language
         $this->ip_details();

        return view('index', [
            'promos' => $is_not_banner,
            'banners' => $banner_carousel->get(),
            'long_term_posts' => $long_term_post->get(),
            'advertisements' => $objectAdd->data,
            'carousels' => $carousels->get(),
            // 'promo_participant' => $promo_participant,
        ]);
    }
    
    
    public function show($slug, $url_id) {
        $promo = Promo::with('participants', 'codes')->where('slug', $slug)->where('url_id', $url_id)->first();
        $promoSidebar = Promo::where([['status', 'Active'], ['end_date', '>=', Carbon::now()->format('Y-m-d')]])->orderBy('created_at', 'desc')->limit(7);
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $objectAdd = json_decode(json_encode($ads));
        if($promo) {
            if($promo->status == "Active") {
                $start_date = Carbon::parse($promo->start_date);
                $end_date = Carbon::parse($promo->end_date);
                $days_left = Carbon::parse(Carbon::now())->diffInDays($end_date, false) + 1;
                $question = Question::with('choices')->where('promo_id', $promo->id);

                if($promo->end_date <= Carbon::now()->format('Y-m-d') || $promo->end_date == Carbon::now()->format('Y-m-d')) {
                    return redirect('/promo'. '/' . $slug . '/' . $url_id . '/promo_ended');
                }elseif($promo){
                    return view('single-promo', [
                        'promos' => $promo,
                        'days_left' => $days_left,
                        'questions' => $question->get(),
                        'promoSidebar' => $promoSidebar->get()
                    ]);
                }
                else {
                    abort(404, 'Unauthorized action.');
                }
            } else {
                return view('single-promo', [
                    'promos' => $promo,
                    'questions' => $question->get(),
                    'promoSidebar' => $promoSidebar->get()
                ]);
            }
        } else {
            abort(404, 'Unauthorized action.');
        }
    }

public function store_register(Request $request, $slug, $url_id) {
        $promo = Promo::with('participants')->where('slug', $slug)->where('url_id', $url_id)->first();
        
        $validator = Validator::make($request->all(), [
            'k8_username' => 'required|min:3|max:30',
            'preferred_platform' => 'required|min:3|max:30',
        ],
        [
            'k8_username.required' => 'K8 Username field must not be empty.',
            'preferred_platform.required' => 'Social ID field must not be empty.',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {

            if($promo->type == "click_to_join") {

                $participant_exist = Participant::where([['k8_username', $request->k8_username], ['promo_url_id', $url_id], ['participant_ip', request()->ip()]])->exists();
                if($participant_exist == null) {

                    if($promo->game_type == "upload_image") {
    
                        $newImageName = uniqid() . '.' . $request->image->extension();
                        $request->image->move(public_path('/images/participants'), $newImageName);
    
                        $participant = Participant::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'k8_username' => strtolower($request->k8_username),
                            'winner' => "No",
                            'promo_id' => $promo->id,
                            'participant_ip' => request()->ip(),
                            'preferred_platform' => $request->social_platform . " : " . $request->preferred_platform,
                            'promo_url_id' =>  $url_id,
                            'image' =>  $request->image = $newImageName
                        ]);
                    }elseif($promo->game_type == "leave_comment") {
                        $participant = Participant::create([
                            'preferred_platform' => $request->preferred_platform,
                            'k8_username' => strtolower($request->k8_username),
                            'winner' => "No",
                            'promo_id' => $promo->id,
                            // 'comment' => $request->comment,
                            'promo_url_id' =>  $url_id,
                            'participant_ip' => request()->ip(),
                        ]);
                    }elseif($promo->game_type == "multiple_choice") {

                        $no_answer = "0"; 

                        foreach($request->choices as $choice => $choice_value) {
                            $choices[] = $choice_value;
                        }

                        if(in_array($no_answer, $choices)) {
                            return redirect()->back()->with('click-to-join-message-failed', 'Please answer all the questions')->withInput();
                        } else {
                            $participant = Participant::create([
                                'preferred_platform' => $request->preferred_platform,
                                'k8_username' => strtolower($request->k8_username),
                                'winner' => "No",
                                'promo_id' => $promo->id,
                                // 'comment' => $request->comment,
                                'promo_url_id' =>  $url_id,
                                'participant_ip' => request()->ip(),
                            ]);
    
                            foreach ($request->choices as $choice_values) {
                                if (is_array($choice_values)) {
                                    foreach ($choice_values as $choice_value) {
                                        $participant->choices()->attach($choice_value);
                                    }
                                }  else {
                                    $participant->choices()->attach($choice_values);
                                }
                            }


                            foreach($request->question_comment as $question_value) {
                                Comment::create([
                                    'promo_id' => $promo->id,
                                    'participant_id' => $participant->id,
                                    'url_id' => $promo->url_id,
                                    'answers' => $question_value,
                                ]);
                            }
                            


                            // foreach ($request->choices as $key => $choice_value) {
                            //     $choices =  $participant->choices()->attach($choice_value);
                            // }
                        }

                    }  else {
                        $participant = Participant::create([
                            'preferred_platform' => $request->preferred_platform,
                            'k8_username' => strtolower($request->k8_username),
                            'retweet_url' => $request->paste_retweet_url,
                            // 'comment' => $request->comment,
                            'winner' => "No",
                            'promo_id' => $promo->id,
                            'promo_url_id' =>  $url_id,
                            'participant_ip' => request()->ip(),
                        ]);
                    }

                   
                    $participant->promos()->attach($promo->id);

                    return redirect()->back()->with('click-to-join-message-success', 'Thank you for your participation. Stay tuned for the winner announcement!');
                    
                } else {
                    return redirect()->back()->with('click-to-join-message-failed', 'Looks like you have already joined this activity');
                }
            }
        }
    }

    public function participant_registered() {
        return view('home/participant_registered');
    }

    public function promo_ended($slug, $url_id) {

        $promo = Promo::where('slug', $slug)->where('url_id', $url_id)->first();
        $promoSidebar = Promo::where('status', 'Active')->orderBy('created_at', 'desc')->limit(5);
        $end_date = Carbon::parse($promo->end_date);
        $days_left = Carbon::parse(Carbon::now())->diffInDays($end_date, false) + 1;
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $objectAdd = json_decode(json_encode($ads));
        $question = Question::with('choices')->where('promo_id', $promo->id);

        if($promo->end_date <= Carbon::now()->format('Y-m-d')) {
            return view('single-promo', [
                'promos' => $promo,
                'days_left' => $days_left,
                'advertisements' => $objectAdd->data,
                'questions' => $question->get(),
                'promoSidebar' => $promoSidebar->get()
            ]);
        } else {
            return redirect('single-promo', [
                'promos' => $promo,
                'days_left' => $days_left,
                'advertisements' => $objectAdd->data,
                'questions' => $question->get(),
                'promoSidebar' => $promoSidebar->get()
            ]);
        }
    }


    public function subscribe_newsletter(Request $request, $slug, $url_id) {

        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5|max:30',
        ],
        [
            'email.required' => 'Email field must not be empty.',
            'email.email'   => 'Please enter valid email address.'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $email_exists = Subscription::where('email', $request->email)->exists();
            
            if($email_exists == null) {
                $user = Subscription::create([
                    'email' => $request->email,
                    'status' => '1',
                    'ip' => request()->ip(),
                    'code' => $getLocale,
                ]);
                return redirect()->back()->with('click-to-join-message-success', 'Thank you for your subscription. Please stay tuned for more giveaways.');
            } else {
                return redirect()->back()->with('click-to-join-message-failed', 'Looks like you have already subscribe to our newsletter.');
            }
        }
    }


    public function subscribeIndex() {
        return view('layouts.newsletter');
    }

    public function subscribeStore(Request $request) {

        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5|max:30',
        ],
        [
            'email.required' => 'Email field must not be empty.',
            'email.email'   => 'Please enter valid email address.'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $email_exists = Subscription::where('email', $request->email)->exists();
            
            if($email_exists == null) {
                $user = Subscription::create([
                    'email' => $request->email,
                    'status' => '1',
                    'ip' => request()->ip(),
                    'code' => $getLocale,
                ]);
                return redirect()->back()->with('click-to-join-message-success', 'Thank you for your subscription. Please stay tuned for more giveaways.');
            } else {
                return redirect()->back()->with('click-to-join-message-failed', 'Looks like you have already subscribe to our newsletter.');
            }
        }
    }

    public function ip_details()
    {
        //  $ip = '175.45.142.131'; //For static IP address get (JAPAN)
//          $ip = '103.100.137.255'; //For static IP address get (PHILIPPINES)
//        $ip = \Request::ip();//Dynamic IP address get
//          $ip = '85.214.132.117'; //For static IP address get (Germany)
//        $data = \Location::get($ip);
//        $locale = strtolower($data->countryCode);
//        if (isset($locale) && in_array($locale, config('app.available_locales'))) {
//            app()->setLocale($locale);
//        }
    }
}
