<?php


namespace App\Services;

use Jenssegers\Agent\Facades\Agent;
use App\Repositories\UploadRepository;


class UploadService extends BaseService
{
    /**
     * @var uploadRepository
     */
    protected $uploadRepository;

    /**
     * constructor
     *
     * @param UploadRepository $uploadRepository
     */
    public function __construct(
        UploadRepository $uploadRepository
    )
    {
        $this->uploadRepository = $uploadRepository;
    }

    /**
     * Save Cookie get data
     *
     * @param $imageId
     *
     * @return Array product
     */
    public function saveSessionImage($request, $imageId)
    {
        $request->session()->push('image_session', $imageId);
    }

    /**
     * Delete Cookie Image
     *
     *
     * @return Array image
     */
    public function deleteSessionImage($request)
    {
        if($request->session()->has('image_session')){
            $request->session()->forget('image_session');
        }
    }

    /**
     * 
     * 
     */
    public function deleteImage($original_name){
        $item = $this->uploadRepository->getData($original_name);
        return $item;
    }

    /**
     * 
     * 
     */
    public function findByUploadId($id){
        $item = $this->uploadRepository->findByUploadId($id);
        return $item;
    }
}