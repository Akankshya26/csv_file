<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class ImportUser implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            if ($row->filter()->isNotEmpty()) {

                Validator::make($row->toArray(), [
                    'name'     => 'required|string',
                    'city'     => 'required|string',
                    'age'      => 'required|integer',
                    'email'    => 'required|email',
                    'password' => 'required',
                ])->validate();
                User::create([
                    'name'  => $row['name'],
                    'city'  => $row['city'],
                    'age'   => $row['age'],
                    'email' => $row['email'],
                    'password' => bcrypt($row['password']),
                ]);
            }
        }
    }
}
