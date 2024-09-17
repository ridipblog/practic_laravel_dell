@if (count($members)!=0)
    <div id="content">

        @foreach ($members as $member)
            <div class="member">
                <h3>{{ $member->name }}</h3>
                <p>{{ $member->roll }}</p>
            </div>
        @endforeach
    </div>
@endif
