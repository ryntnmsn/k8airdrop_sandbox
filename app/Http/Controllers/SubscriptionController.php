<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Admin\SubscriptionRepositoryInterface;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    /**
     * @param SubscriptionRepositoryInterface $subscriptionRepository
     */
    public function __construct(SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function index(Request $request)
    {
        
        if($request->sort == 'japan') {
            $subscription = $this->subscriptionRepository->index();
        } else {
            $subscription = $this->subscriptionRepository->index();
        }
        
        // dd($subscription->toArray());
       return view('admin.subscription.index', [
           "subscribers" => $subscription
        ]);
    }

    public function show($id)
    {
        return Subscription::find($id);
    }

    public function store(SubscriptionRequest $request)
    {
        // $ip = \Request::ip();//Dynamic IP address get
        // //$ip = '175.45.142.131'; //For static IP address get (JAPAN)
        // $ip = '103.100.137.255'; //For static IP address get (PHILIPPINES)
        // //$ip = '85.214.132.117'; //For static IP address get (Germany)
        // $data = \Location::get($ip);
        // $locale = strtolower($data->countryCode);
       

        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $subscription = $this->subscriptionRepository->store(
            [
                'email' => $request->email,
                'status' => '1',
                'ip' => $request->ip(),
                'code' => $getLocale
            ]
        );
        
        if($subscription) {
            $response = [
                'success' => true,
                'message' => 'Operation successful'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Something Wrong. Please try again later'
            ];
        }
        
        return response()->json($response);
    }


    public function showJapan() {
        $subscribers = Subscription::where('code', 'jp');
       
        return view('admin.subscription.japan', [
            'subscribers' => $subscribers->get()
        ]);
    }
    
}
