<?php

  namespace App\Exports;

  use DB;

  use Maatwebsite\Excel\Concerns\FromCollection;

  use Maatwebsite\Excel\Concerns\WithHeadings;

  use App\Models\Participant;

  use Maatwebsite\Excel\Concerns\FromQuery;

  use Maatwebsite\Excel\Concerns\Exportable;
  
  use Maatwebsite\Excel\Concerns\WithMapping;

class ExportParticipants implements FromCollection, WithHeadings, WithMapping {

  protected $url_id;

  public function __construct($url_id = null) {
    $this->url_id = $url_id;
  }

   public function headings(): array {
    
    return [
        
        "ID",
 
        "K8 Username",

        "Winner",
        
        "Promo URL ID",

        "Retweet URL",
        
        "Comment",

        "SNS ID",

        "Participant IP",

        "Joined Date",
       ];

    }

    public function collection(){
        $url_id = $this->url_id;

        $participantsData = Participant::where('promo_url_id', $url_id)->get();
  
        return collect($participantsData);
 
    }
    
    
    public function map($row): array{
           $fields = [
              $row->id,
              $row->k8_username,
              $row->winner,
              $row->promo_url_id,
              $row->retweet_url,
              $row->comment,
              $row->preferred_platform,
              $row->participant_ip,
              $row->created_at
         ];
        return $fields;
    }


}
