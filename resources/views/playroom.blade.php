<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    
<table style="border:1px solid #000000">
    <tr>
        <td style="border:1px solid #000000">ID</td>
        <td style="border:1px solid #000000">Name</td>
        <td style="border:1px solid #000000">K8 Username</td>
        <td style="border:1px solid #000000">Email</td>
        <td style="border:1px solid #000000">SNS ID</td>
        <td style="border:1px solid #000000">Participant IP</td>
        <td style="border:1px solid #000000">Joined date</td>
        <td style="border:1px solid #000000">Retweet URL</td>
        <td style="border:1px solid #000000">Comment</td>
        <td style="border:1px solid #000000">Is winner?</td>
        @foreach($questions as $item)
            <td style="border:1px solid #000000" style="border:1px solid #000000">{{$item->question}}</td>
        @endforeach
  
        
    </tr>
    
    @foreach($participants as $participant)
        <tr>
            <td style="border:1px solid #000000">{{$participant->id}}</td>
            <td style="border:1px solid #000000">{{$participant->name}}</td>
            <td style="border:1px solid #000000">{{$participant->k8_username}}</td>
            <td style="border:1px solid #000000">{{$participant->email}}</td>
            <td style="border:1px solid #000000">{{$participant->preferred_platform}}</td>
            <td style="border:1px solid #000000">{{$participant->participant_ip}}</td>
            <td style="border:1px solid #000000">{{$participant->created_at}}</td>
            <td style="border:1px solid #000000">{{$participant->retweet_url}}</td>
            <td style="border:1px solid #000000">{{$participant->comment}}</td>
            <td style="border:1px solid #000000">{{$participant->winner}}</td>
            

            
            @foreach($questions as $question)
                <td style="border:1px solid #000000">
                    @foreach ($participant->choices as $participant_choice)
                        @foreach ($question->choices as $question_choice)
                            @if($participant_choice->id == $question_choice->id)
                                {{ $question_choice->choice }}
                            @endif
                        @endforeach
                    @endforeach
                </td>
            @endforeach


        </tr>
    @endforeach
</table>


         
          

</body>
</html>