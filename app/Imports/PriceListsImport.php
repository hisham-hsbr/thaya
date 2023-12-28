<?php

namespace App\Imports;

use App\Models\PriceList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class PriceListsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $priceList = new PriceList([
            "code"=>$row['code'],
            "name"=>$row['name'],
            "group"=>$row['group'],
            "packing"=>$row['packing'],
            "uom"=>$row['uom'],
            "packet_price"=>$row['packet_price'],
            "half_packet_price"=>$row['half_packet_price'],
            "cash_price"=>$row['cash_price'],
            "credit_price"=>$row['credit_price'],
            "description"=>$row['description'],
            "status"=>$row['status'],
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        ]);
        return $priceList;
    }
}
