<?php

namespace App\Http\Controllers;

use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    /**
     * WIDGETS INDEX
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets = Widget::all();

        return response()->json(['widgets' => $widgets], 200);
    }

    /**
     * WIDGETS STORE
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'max:100',
        ]);

        $widget = new Widget(
            [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]
        );
        $widget->save();

        return response()->json(['widget' => $widget], 201);
    }

    /**
     * WIDGETS SHOW
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $widget = Widget::find($id);
        if (!$widget) {
            return response()->json(null, 404);
        }

        return response()->json(['widget' => $widget], 200);
    }

    /**
     * WIDGET PATCH
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'max:100',
        ]);

        $widget = Widget::find($id);
        if (!$widget) {
            return response()->json(null, 404);
        }

        $widget->name = $request->get('name');
        $widget->description = $request->get('description');
        $widget->save();

        return response()->json(['widget' => $widget], 200);
    }

    /**
     * WIDGETS DELETE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $widget = Widget::find($id);
        if (!$widget) {
            return response()->json(null, 404);
        }
        $widget->delete();

        return response()->json(null, 200);
    }
}
