<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityDetailsRequest;
use App\Http\Resources\OpportunityDetail as OpportunityDetailResource;
use App\Models\OpportunityDetail;

class OpportunityDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(OpportunityDetailsRequest $request)
    {
        $opportunityDetail = OpportunityDetail::create([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OpportunityDetail $opportunityDetail)
    {
        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OpportunityDetail $opportunityDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function update(OpportunityDetailsRequest $request, OpportunityDetail $opportunityDetail)
    {
        $opportunityDetail->update([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpportunityDetail $opportunityDetail)
    {
        //
    }
}
