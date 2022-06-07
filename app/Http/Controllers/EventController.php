<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('welcome', ['events' => $events]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event();
    
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) // Verificando se foi inserido uma imagem e se essa imagem inserida é válida
        {
            $requestImage = $request->image;

            $extension = $requestImage->extension(); // recebendo a extensão da imagem, por exemplo: .jpg, .png, etc.

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . '.' . $extension; // O md5 é uma função que transforma o conteúdo em um hash

            $requestImage->move(public_path('img/events'), $imageName); // movendo a imagem para uma pasta reservada (a pasta reservada é a events dentro de img)

            $event->image = $imageName; // persistindo o nome da imagem no banco de dados
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
