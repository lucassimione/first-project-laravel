<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search){ // se recebeu parametro para busca faça:
            $events = Event::where([['title', 'like', '%' . $search . '%']])->get();
        }else{ // se nao mostra todos
            $events = Event::all();
        }
       
        return view('welcome', ['events' => $events, 'search' => $search]);
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

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner'  => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'evento deletado com sucesso!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) // Verificando se foi inserido uma imagem e se essa imagem inserida é válida
        {
            $requestImage = $request->image;

            $extension = $requestImage->extension(); // recebendo a extensão da imagem, por exemplo: .jpg, .png, etc.

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . '.' . $extension; // O md5 é uma função que transforma o conteúdo em um hash

            $requestImage->move(public_path('img/events'), $imageName); // movendo a imagem para uma pasta reservada (a pasta reservada é a events dentro de img)

            $data['image'] = $imageName; // persistindo o nome da imagem no banco de dados
        }

        Event::findOrFail($request->params['id'])->update($data);
        return redirect('/dashboard')->with('msg', 'evento editado com sucesso!');
    }
}
