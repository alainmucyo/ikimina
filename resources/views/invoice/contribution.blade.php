<div style="padding: 2%;width: 400px;border: solid gray 1px">
    <h3>IKIMINA Dufatanye </h3>
    <hr>
    <h3>Itangwa Ry' umusanzu:</h3>
    <p><b>Amazina: </b>{{ $member->name }}</p>
    <p><b>Amafaranga: </b>{{ $amount }} Rwf</p>
    <p><b>Itariki Atangiwe: </b>{{ Date("Y-M-d") }}</p>
    <p><b>Yishyuriwe Ukwezi Kwa {{ $month }}</b></p>
    <p><b>Igiteranyo Cy' Umusanzu waose mumaze guatanga: </b>{{ $total }} Rwf</p>

    <p>
    <center>Signatures:</center>
    <br>
    <span>Accountant: .......................</span>
    <span style="float: right;">Client: .......................</span>

    </p>
</div>