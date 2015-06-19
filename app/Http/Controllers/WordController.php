<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Word;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $words = Word::with('alphabet', 'created_by', 'definitions')->get()->toArray();
        foreach ($words as $word) {
            $words[] = self::sanitizeWord($word);
        }

        return Response::json($words);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = Input::all();
        $word = Word::create($data);
        $response['message'] = 'Word saved';
        $response['word'] = $word;

        return Response::json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $response = [];
        try {
            $word = Word::with('alphabet', 'created_by', 'definitions')->findOrFail($id)->toArray();
            $response['message'] = 'found';
            $response['data'] = self::sanitizeWord($word);
        } catch (ModelNotFoundException $e) {
            $response['message'] = 'Not found';
            $response['code'] = 404;
        }

        return Response::json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public static function sanitizeWord($word)
    {
        $carbon = new Carbon();
        $data = $word;
        unset($data['created_at']);
        unset($data['updated_at']);
        unset($data['letter_id']);
        unset($data['created_by']['created_at']);
        unset($data['created_by']['updated_at']);
        $data['created'] = $carbon->toFormattedDateString($word['created_at']);
        $data['updated'] = $carbon->toDayDateTimeString($word['updated_at']);

        return $data;
    }
}
