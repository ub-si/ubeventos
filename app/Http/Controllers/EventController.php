<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private ?Event $event;

    /**
     * Class constructor
     *
     * @param Event $event dependence injection
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EventResource::collection(
            $this->event->all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $data = $request->all();

        /** @var User $user */
        $user = Auth()->user();
        $data['created_by'] = $user->id;

        $event = $this->event->create($data);

        $resource = new EventResource($event);
        return $resource->response()->setStatusCode(201);
    }

    public function speakers(string $id)
    {
        $event = Event::find($id);
        if($event) {
            return UserResource::collection($event->speakers);
        }
        return response(['error' => 'Evento não encontrado.'], 404);
    }

    public function addSpeaker(string $id, Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $event = Event::find($id);
        if($event) {
            $event->addSpeaker($data['user_id']);
            return response(['success' => 'Palestrante adicionado.'], 201);
        }
        return response(['error' => 'Evento não encontrado.'], 404);
    }

    public function removeSpeaker(string $id, Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $event = Event::find($id);
        if($event) {
            $event->removeSpeaker($data['user_id']);
            return response()->json(['success' => 'Participante removido.'], 204);
        }
        return response(['error' => 'Evento não encontrado.'], 404);
    }

    public function participants(string $id)
    {
        $event = Event::find($id);
        if($event) {
            return UserResource::collection($event->participants);
        }
        return response(['error' => 'Evento não encontrado.'], 404);
    }

    public function addParticipant(string $id, Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $event = Event::find($id);
        if($event) {
            $event->addParticipant($data['user_id']);
            return response(['success' => 'Participante adicionado.'], 201);
        }
        return response(['error' => 'Evento não encontrado.'], 404);
    }

    public function removeParticipant(string $id, Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $event = Event::find($id);
        if($event) {
            $event->removeParticipant($data['user_id']);
            return response()->json(['success' => 'Palestrante removido.'], 204);
        }
        return response(['error' => 'Evento não encontrado.'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = $this->event->find($id);
        if ($event) {
            return new EventResource($event);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $event = $this->event->find($id);
        if ($event) {
            $event->update($request->all());
            return new EventResource($event);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = $this->event->find($id);
        if ($event) {
            $event->delete();
            return response()->json([], 204);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }
}
