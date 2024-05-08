<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

use App\Http\Resources\ContactResource;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    public function index()
    {
        return ContactResource::collection(Contact::all());
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        return ContactResource::make($contact);
    }

    public function show(Contact $contact)
    {
        return ContactResource::make($contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->NoContent();
    }
}
