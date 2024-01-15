<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>K8 Username</td>
        <td>Email</td>
        <td>SNS ID</td>
        <td>Participant IP</td>
        <td>Joined date</td>
        <td>Retweet URL</td>
        <td>Comment</td>
        <td>Is winner?</td>
       
        @foreach($questions as $question)
            @if($question->type == 'single_select' || $question->type == 'multiple_select')
                <td>{{$question->question}}</td>
            @endif
           
            @if($question->type == 'comment')
                <td>{{$question->question}}</td>
            @endif
        
        @endforeach
        
    </tr>
    @foreach($participants as $participant)
        <tr>
            <td>{{$participant->id}}</td>
            <td>{{$participant->name}}</td>
            <td>{{$participant->k8_username}}</td>
            <td>{{$participant->email}}</td>
            <td>{{$participant->preferred_platform}}</td>
            <td>{{$participant->participant_ip}}</td>
            <td>{{$participant->created_at}}</td>
            <td>{{$participant->retweet_url}}</td>
            <td>{{$participant->comment}}</td>
            <td>{{$participant->winner}}</td>

            @foreach($questions as $question)
                @if($question->type == 'single_select' || $question->type == 'multiple_select')
                    <td>
                        @foreach ($participant->choices as $participant_choice)
                            @foreach ($question->choices as $question_choice)
                                @if($participant_choice->id == $question_choice->id)
                                    [{{ $question_choice->choice }}]
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                    @endif
            @endforeach


            @foreach ($comments as $comment)
                @if($participant->id == $comment->participant_id)
                    <td>
                        {{ $comment->answers }}
                    </td>
                @endif
            @endforeach

        </tr>
    @endforeach
</table>