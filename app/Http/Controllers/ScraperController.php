<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScraperRequest;
use App\Http\Requests\UpdateScraperRequest;
use App\Models\Scraper;
use Goutte\Client;
use App\Models\Company;

class ScraperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    	
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scraper.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScraperRequest $request)
    {
	      $client = new Client();
	  
		    $website = $client->request('GET', $request->url);

		    $data = $website->filter('table#customers')->each(function ($row) {
            $columns = $row->filter('td')->each(function ($column) {
                return $column->text();
            });

            $company;
            $contact;
            $country;

            $number = 0;


            foreach ($columns as $value) {
            	if ($number === 0) {
            		$company = $value;
            		$number++;
            	} elseif ($number === 1) {
            		$contact = $value;
            		$number++;
            	} else {
            		$country = $value;

            		$info = new Company();
            		$info->company = $company;
            		$info->contact = $contact;
            		$info->country = $country;
            		$info->save();

            		$number = 0;
            	}
            }

        });

		    return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Scraper $scraper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scraper $scraper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScraperRequest $request, Scraper $scraper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scraper $scraper)
    {
        //
    }
}
