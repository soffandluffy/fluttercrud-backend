<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityRequest;
use App\Http\Resources\OpportunityCollection;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use App\Http\Resources\Opportunity as OpportunityResource;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OpportunityCollection(Opportunity::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpportunityRequest $request)
    {
        // $table->id();
        // $table->string('title');
        // $table->text('description');
        // $table->unsignedBigInteger('category_id');
        // $table->unsignedBigInteger('country_id');
        // $table->timestamp('deadline');
        // $table->string('organizer');
        // $table->unsignedBigInteger('created_by');
        // $table->timestamps();

        $opportunity = Opportunity::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'deadline' => $request->deadline,
            'organizer' => $request->organizer,
            'created_by' => $request->created_by,
        ]);
        return new OpportunityResource($opportunity);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        return new OpportunityResource($opportunity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function update(OpportunityRequest $request, Opportunity $opportunity)
    {
        //
        $opportunity->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'deadline' => $request->deadline,
            'organizer' => $request->organizer,
            'created_by' => $request->created_by,
        ]);

        return new OpportunityResource($opportunity);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return "Opportunity successfully deleted!";
    }
}
