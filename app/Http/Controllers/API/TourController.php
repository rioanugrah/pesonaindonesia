<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\v2\Tour;

class TourController extends Controller
{
    public function __construct(
        Tour $tour
    )
    {
        $this->tour = $tour;
    }

    public function list_tour()
    {
        $tours = $this->tour->all();
        try {
            foreach ($tours as $key => $tour) {
                $data[] = [
                    'id' => $tour->id,
                    'kode_tour' => $tour->kode_tour,
                    'title' => $tour->title,
                    'slug' => $tour->slug,
                    'jenis_tour' => $tour->jenis_tour,
                    'min_people' => $tour->min_people,
                    'max_people' => $tour->max_people,
                    'location' => $tour->location,
                    'current_price' => $tour->current_price,
                    'previous_price' => $tour->previous_price,
                    'discount' => $tour->discount,
                    'images' => asset('backend_2023/images/tour/'.$tour->images),
                ];
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ],200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
