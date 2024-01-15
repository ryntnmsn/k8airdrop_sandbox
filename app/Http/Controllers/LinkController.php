<?php

namespace App\Http\Controllers;
use App\Models\Link;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function view() {//Home page
        $links = Link::where('status', 'active');
        return view('links', [
            'links' => $links->get(),
        ]);
    }

    public function index() { //Admin page
        $link = Link::all();
        return view('admin.links.index', [
            'links' => $link,
        ]);
    }

    public function create() {
        return view('admin.links.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:255',
            'url' => 'required|min:4|max:255',
            'icon' => 'required|mimes:jpeg,png,jpg,JPEG,PNG|max:2000'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $newIconName = uniqid() . '.' . $request->icon->extension();
            $request->icon->move(public_path('/images/ads/'), $newIconName);
            Link::create([
                'name' => $request->name,
                'url' => $request->url,
                'status' => $request->status,
                'icon' => $request->icon = $newIconName,
            ]);
            return redirect()->back()->with('message', 'Link create successfully.');
        }
    }

    public function edit(Request $request, $id) {
        $link = Link::findOrfail($id);
        return view('admin.links.edit', [
            'links' => $link,
        ]);
    }

    public function update(Request $request, $id) {
        $links = Link::findOrfail($id);
        if($request->icon == "") {
            $links->update([
                'name' => $request->name,
                'url' => $request->url,
                'status' => $request->status
            ]);
            return redirect()->back()->with('message', 'Link updated successfully');
        } else {
            $newIconName = uniqid() . '.' . $request->icon->extension();
            $request->icon->move(public_path('/images/ads/'), $newIconName);
            $links->update([
                'name' => $request->name,
                'url' => $request->url,
                'status' => $request->status,
                'icon' => $request->icon = $newIconName,
            ]);
            return redirect()->back()->with('message', 'Link updated successfully');
        }
    }
}
