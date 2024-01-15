<?php

namespace App\Http\Controllers;

use App\Interfaces\Admin\LanguageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LanguageRequest;

class LanguageController extends Controller
{

    /**
     * @param LanguageRepositoryInterface $languageRepository
     */
    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = $this->languageRepository ->index([]);
        return view('admin.language.index', [
            'languages' => $languages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $language = $this->languageRepository ->store($request->except('_method'));
        if($language) {
            return redirect(route('admin.languages.index'))->with('message', 'New Promo added successfully.');
        } else {
            return redirect(route('admin.languages.index'))->with('message', 'Please Try again');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = $this->languageRepository->show($id);
        return view('admin.language.edit', [
            'language'         => $languages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $language = $this->languageRepository->update($request->except('_method'),$id);
        if($language) {
            return redirect(route('admin.languages.index'))->with('message', 'New Promo added successfully.');
        } else {
            return redirect(route('admin.languages.index'))->with('message', 'Please Try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = $this->languageRepository->destroy($id);
        if($language) {
            return redirect(route('admin.languages.index'))->with('message', 'New Promo added successfully.');
        } else {
            return redirect(route('admin.languages.index'))->with('message', 'Please Try again');
        }
    }
}
