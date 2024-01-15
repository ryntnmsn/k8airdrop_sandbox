<?php

namespace App\Http\Controllers;
use App\Models\Promo;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Interfaces\API\AdvertisementRepositoryInterface;

class ResultController extends Controller
{
    private AdvertisementRepositoryInterface $ad;

    /**
     * @param AdvertisementRepositoryInterface $ad
     */
    public function __construct(AdvertisementRepositoryInterface $ad)
    {
        $this->ad = $ad;
    }

    public function index() {

        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $promo = Promo::with('participants', 'platforms')->where('status', 'Archive');
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $objectAdd = json_decode(json_encode($ads));

        if($getLocale == "jp") {
            $promo = $promo->where('language_id', 2)->orderBy('start_date', 'DESC')->paginate(10);
        } else {
            $promo = $promo->where('language_id', 1)->orderBy('start_date', 'DESC')->paginate(10);
        }


        return view('results', [
            'promos' => $promo,
            'advertisements' => $objectAdd->data
        ]);
    }

    public function show($slug, $url_id) {
        $related_promo = Promo::inRandomOrder()->where('status', 'Active')->where('is_banner', 'No')->limit(3);

        $promo = Promo::with('participants', 'platforms')->where('slug', $slug)->where('url_id', $url_id)->where('status', 'Archive')->first();
        $ads = $this->ad->index(['status'=>'active'])->toArray();
        $objectAdd = json_decode(json_encode($ads));

        return view('results-single', [
            'promos' => $promo,
            'related_promo' => $related_promo->get(),
            'advertisements' => $objectAdd->data
        ]);
    }
}
