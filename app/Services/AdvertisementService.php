<?php

namespace App\Services;
use App\Interfaces\Admin\AdvertisementRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use Auth;

class AdvertisementService
{
    protected AdvertisementRepositoryInterface $advertisement;


    /**
     * @param AdvertisementRepositoryInterface $advertisement
     */
    public function __construct(AdvertisementRepositoryInterface $advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * @param Request $request
     * @return Array
     */
    #[ArrayShape(["success" => "bool", "data" => "array", "message" => "string"])]
    function index(Request $request): Array
    {
        return $this->advertisement->index($request->all())->toArray();
//        try {
//
//            $response = array ("success" => true,"data" => $result, "message" => 'operation successufl');
//        } catch(\Throwable  $e) {
//            $response = array ("success" => false,"data" => [], "message" => $this->getMessage($e));
//        }
//        return $response;
    }

    /**
     * @param array $data
     * @return Array
     */
    #[ArrayShape(["success" => "bool", "data" => "array", "message" => "string"])]
    public function store(Array $data): Model
    {
        $data = $this->refineData($data);
        return $this->advertisement->store($data);
//        try {
//            $result = $this->advertisement->store($data);
//            $response = array ("success" => true,"data" => $result, "message" => 'operation successufl');
//        } catch(\Throwable  $e) {
//            $response = array ("success" => false,"data" => [], "message" => $this->getMessage($e));
//        }
//        return $response;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Array
     */
    #[ArrayShape(["success" => "bool", "data" => "array", "message" => "string"])]
    public function show(int $id): Array
    {
        return $this->advertisement->show($id)->toArray();
    }

    /**
     * @param array $data
     * @param int $id
     * @return Array
     */
    #[ArrayShape(["success" => "bool", "data" => "array", "message" => "string"])]
    public function update(Array $data, int $id): bool
    {
        $data = $this->refineData($data);
        return $this->advertisement->update($data, $id);
//        try {
//            $result = $this->advertisement->update($data, $id);
//            $response = array ("success" => true,"data" => $result, "message" => 'operation successufl');
//        } catch(\Throwable  $e) {
//            $response = array ("success" => false,"data" => [], "message" => $this->getMessage($e));
//        }
//        return $response;
    }

    /**
     * @param int $id
     * @return Array
     */
    #[ArrayShape(["success" => "bool", "data" => "array", "message" => "string"])]
    public function destroy(int $id): bool
    {
        return $this->advertisement->destroy($id);
//        try {
//            $result = $this->advertisement->destroy($id);
//            $response = array ("success" => true,"data" => $result, "message" => 'operation successufl');
//        } catch(\Throwable  $e) {
//            $response = array ("success" => false,"data" => [], "message" => $this->getMessage($e));
//        }
//        return $response;
    }

    /**
     * @param array $data
     * @return array
     */
    public function refineData(Array $data)
    {
        $data['user_id'] = Auth::user()->id;
        if(isset($data['img_url'])) {
            $data['img_url'] = put_img_under_public($data['img_url'] ,'ads/');
        }
        if(isset($data['video_url'])) {
            $data['video_url'] = put_img_under_public($data['video_url'] ,'ads/');
        }
        return $data;
    }
}