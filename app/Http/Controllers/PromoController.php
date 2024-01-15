<?php

namespace App\Http\Controllers;
use App\Models\Language;
use App\Models\Platform;
use App\Models\Promo;
use App\Models\Code;
use App\Models\Participant;
use App\Models\User;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PromoRequest;
use Illuminate\Support\Facades\Log;

class PromoController extends Controller
{
    public function index(Request $request) {

        $platform = Platform::all();
        $promo = Promo::with('language')->where('status', '!=', 'Archive')->orderBy('created_at', 'desc')->paginate(25);
        $languages = Language::all();

        return view('admin.promo.index',[
            'promos' => $promo,
            'languages' => $languages,
            'oldLang' => $request->language
        ]);
    }

    public function create() {
        $id = Auth::id();
        $user = User::all();
        $user_platform = User::with('platforms')->find($id);
        $platform = Platform::all();
        $languages = Language::all();
        return view('admin.promo.create', [
            'platforms' => $platform,
            'user_platforms' => $user_platform,
            'users' =>  $user,
            'languages' => $languages,
        ]);
    }

    public function store(Request $request) {

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
            'start_date' => 'required|date|nullable',
            'end_date' => 'required|date|nullable'
        ],
        [
            'title.required' => 'Title is required',
            'image.required' => 'Image is required.',
            'image.mimes'   => 'Image should JPG PNG of JPEG in format',
            'image.dimensions' => 'Image dimensions should be 1388x750 in pixels.',
            'image.max' => 'Image max filesize is 512KB only.',
            'start_date.required' => 'Start date is required.',
            'end_date.required' => 'End date is required.',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $newImageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/promos/'), $newImageName);
            $randomString = Str::random(6);
            $promo = Promo::create([
                'title'         =>  $request->title,
                'language_id'   =>  $request->langauge,
                'description'   =>  $request->description,
                'terms_and_conditions'  =>  $request->terms_and_conditions,
                'article'       =>  $request->article,
                'slug'          =>  $request->slug == null ? Str::slug($request->title, '-', 'ja') : Str::slug($request->slug, '-', 'ja'),
                'prize_pool'    =>  $request->prize_pool,
                'platform_id'   =>  $request->platform,
                'start_date'    =>  $request->start_date,
                'end_date'      =>  $request->end_date,
                'status'        =>  $request->status,
                'type'          =>  $request->type,
                'link'          =>  $request->slug == null ? env('APP_URL') . "/promo" . "/" . Str::slug($request->title, '-', 'ja') . "/" . $randomString : env('APP_URL') . "/promo" . "/" . Str::slug($request->slug, '-', 'ja') . "/" . $randomString,
                'winners_link'  =>  $request->winners_link,
                'winners_announcement' => $request->winners_announcement,
                'embedded_code' =>  $request->embedded_code,
                'url_id'        =>  $randomString,
                'code_time_minutes' =>  $request->code_time_minutes,
                'code_time_seconds' =>  $request->code_time_seconds,
                'is_banner'     =>  $request->is_banner,
                'is_interactive' =>  $request->is_interactive,
                'is_long_term_post' =>  'no',
                'button_name'   => $request->button_name,
                'button_link'   => $request->button_link,
                'game_type'     =>  $request->game_type,
                'image'         =>  $request->image = $newImageName,
            ]);

            if(Auth::user()->isSuperAdmin()) {
                $user_checkboxes = $request->get('users_check');
                $promo->users()->sync($user_checkboxes);
            } else {
                $promo->users()->attach($user);
            }
            $promo->platforms()->attach($request->platform);

            return redirect('admin/airdrop/promo')->with('message', 'New Promo added successfully.');
        }
       
    }


    public function edit(Request $request, $id) {
        $user = User::all();
        $user_checkboxes = Promo::with('users')->where('id', $id);
        $user_platform = User::with('platforms')->find(Auth::id());
        $promo = Promo::findOrfail($id);
        $platform = Platform::all();
        $promos = Promo::with('platforms')->where('id', $id);
        $languages = Language::all();
        $oldLang = $promo->language_id;
        return view('admin.promo.edit', [
            'platforms'         => $platform,
            'promos'            => $promo,
            'promo_pivot'       => $promos->get(),
            'user_platforms'    => $user_platform,
            'users'             => $user,
            'user_assigns'      => $user_checkboxes->get(),
            'languages'         => $languages,
            'oldLang'           => $oldLang
        ]);
    }


    public function update(Request $request, $id) {
        $promo = Promo::findOrfail($id);

        if($request->image == null) {
            $promo->update([
                'title'         =>  $request->title,
                'language_id'   =>  $request->langauge,
                'description'   =>  $request->description,
                'terms_and_conditions'  =>  $request->terms_and_conditions,
                'slug'          =>  $request->slug == null ? Str::slug($request->title, '-', 'ja') : Str::slug($request->slug, '-', 'ja'),
                'article'       =>  $request->article,
                'prize_pool'    =>  $request->prize_pool,
                'start_date'    =>  $request->start_date,
                'end_date'      =>  $request->end_date,
                'type'          =>  $request->type,
                'status'        =>  $request->status,
                'platform_id'   => $request->platform,
                'link'          =>  $request->slug == null ? env('APP_URL') . "/promo" . "/" . Str::slug($request->title, '-', 'ja') . "/" . $request->url_id : env('APP_URL') . "/promo" . "/" . Str::slug($request->slug, '-', 'ja') . "/" . $request->url_id,
                'winners_link'  =>  $request->winners_link,
                'winners_announcement'  =>  $request->winners_announcement,
                'embedded_code' =>  $request->embedded_code,
                'code_time_minutes' =>   $request->code_time_minutes,
                'code_time_seconds' =>   $request->code_time_seconds,
                'is_banner'     =>  $request->is_banner,
                'is_interactive' =>  $request->is_interactive,
                'is_long_term_post' =>  'no',
                'button_name'   => $request->button_name,
                'button_link'   => $request->button_link,
                'game_type'     =>  $request->game_type,
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:3|max:100',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
                'start_date' => 'required|date|nullable',
                'end_date' => 'required|date|nullable'
            ],
            [
                'title.required' => 'Title is required',
                'image.required' => 'Image is required.',
                'image.mimes'   => 'Image should JPG PNG of JPEG in format',
                'image.dimensions' => 'Image dimensions should be 1388x750 in pixels.',
                'image.max' => 'Image max filesize is 512KB only.',
                'start_date.required' => 'Start date is required.',
                'end_date.required' => 'End date is required.',
            ]);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            } else {
                $newImageName = uniqid() . '.' . $request->image->extension();
                $request->image->move(public_path('/images/promos/'), $newImageName);
                $promo->update([
                    'title'         =>  $request->title,
                    'language_id'   =>  $request->langauge,
                    'description'   =>  $request->description,
                    'terms_and_conditions'  =>  $request->terms_and_conditions,
                    'article'       =>  $request->article,
                    'prize_pool'    =>  $request->prize_pool,
                    'start_date'    =>  $request->start_date,
                    'end_date'      =>  $request->end_date,
                    'type'          =>  $request->type,
                    'status'        =>  $request->status,
                    'platform_id'   => $request->platform,
                    'link'          =>  $request->link,
                    'winners_link'  =>  $request->winners_link,
                    'winners_announcement'  =>  $request->winners_announcement,
                    'embedded_code' =>  $request->embedded_code,
                    'code_time_minutes' =>   $request->code_time_minutes,
                    'code_time_seconds' =>   $request->code_time_seconds,
                    'is_banner'     =>  $request->is_banner,
                    'is_interactive' =>  $request->is_interactive,
                    'is_long_term_post' =>  'no',
                    'button_name'   => $request->button_name,
                    'button_link'   => $request->button_link,
                    'game_type'     =>  $request->game_type,
                    'image'         =>  $request->image = $newImageName,
                ]);
            }
        }
        if(Auth::user()->isSuperAdmin()) {
            $user_checkboxes = $request->get('users_check');
            $promo->users()->sync($user_checkboxes);
        }
        $promo->platforms()->sync($request->platform);
        return redirect()->back()->with('message', 'Promo updated successfully.');
    }

    public function generate_url(Request $request, $id) {
        $promo = Promo::find($id);

        $promo->update([
            'url_register'  =>  env('APP_URL') . "/promo" . "/" . $promo->slug . "/" . $promo->url_id,
        ]);

        return redirect()->back()->with('message', 'URL generated successfully');
    }

    //DLETE

    public function destroy(Request $request) {
        $promo = Promo::where('id', $request->promo_id);
        $promo->delete();
        return redirect()->back()->with('message', 'Promo deleted successfully.');
    }


    //VIEW PROMO
    public function view(Request $request, $id) {
        $promo = Promo::with('platforms', 'codes', 'participants')->find($id);
        $count = Promo::with('platforms', 'codes', 'participants')->find($id);

        $promo = Promo::with(['participants' => function ($q) {
            $q->orderBy('winner', 'desc')->orderBy('created_at', 'desc');
        }])->find($id);

        $ips = $promo->participants->pluck('participant_ip');
        $duplicateIps = $ips->duplicates()->unique()->all();

        //GENRATE WINNER
        $generate_winner = Promo::with(['participants' => function ($q) {
            $q->inRandomOrder()->where('winner', 'No')->first();
        }])->find($id);

        if($request->search) { //SEARCH
            $promo = Promo::with(['participants' => function ($q) use($request) {
                return $q->where('name', 'LIKE', "%{$request->search}%");
            }])->find($id);

            return view('admin/promo/view', [
                'promos' => $promo,
                'counts' => $count,
                'generated_winners' => $generate_winner,
                'duplicateIps' => $duplicateIps,
            ]);
        }

        return view('admin/promo/view', [
            'promos' => $promo,
            'counts' => $count,
            'generated_winners' => $generate_winner,
            'duplicateIps' => $duplicateIps,

        ]);
    }




}
