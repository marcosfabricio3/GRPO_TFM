<form id="formEditarClase" method="PUT">
    <div class="container mb-3">
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $clase->Nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="Tipo" class="form-label">Tipo:</label>
            <select class="form-select" id="Tipo" name="Tipo" required>
                <option value="">--Seleccione un tipo de clase--</option>
                <option value="Musculación" @if ($clase->Tipo == 'Musculación') selected @endif>Musculación</option>
                <option value="Yoga" @if ($clase->Tipo == 'Yoga') selected @endif>Yoga</option>
                <option value="Crossfit" @if ($clase->Tipo == 'Crossfit') selected @endif>Crossfit</option>
                <option value="Pilates" @if ($clase->Tipo == 'Pilates') selected @endif>Pilates</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="InstructorID" class="form-label">Instructor:</label>
            <select class="form-select" id="InstructorID" name="InstructorID" required>
                <option value="">--Seleccione un instructor--</option>
                @foreach($instructores as $instructor)
                    <option value="{{ $instructor->InstructorID }}" @if ($clase->InstructorID == $instructor->InstructorID) selected @endif>{{ $instructor->Nombre }}</option>
                @endforeach
            </select>
        </div>
        @php
            $diasSemana = explode(',', $clase->DiasSemana);
        @endphp
        <div class="mb-3">
            <label for="DiasSemana" class="form-label">Días de la semana:</label>
            <select class="form-select" id="DiasSemana" name="DiasSemana[]" multiple>
                <option value="Lunes" @if (in_array('Lunes', $diasSemana)) selected @endif>Lunes</option>
                <option value="Martes" @if (in_array('Martes', $diasSemana)) selected @endif>Martes</option>
                <option value="Miércoles" @if (in_array('Miércoles', $diasSemana)) selected @endif>Miércoles</option>
                <option value="Jueves" @if (in_array('Jueves', $diasSemana)) selected @endif>Jueves</option>
                <option value="Viernes" @if (in_array('Viernes', $diasSemana)) selected @endif>Viernes</option>
                <option value="Sábado" @if (in_array('Sábado', $diasSemana)) selected @endif>Sábado</option>
                <option value="Domingo" @if (in_array('Domingo', $diasSemana)) selected @endif>Domingo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Horario" class="form-label">Horario:</label>
            <input type="time" class="form-control" id="Horario" name="Horario" value="{{ \Carbon\Carbon::parse($clase->Horario)->format('H:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="CupoMaximo" class="form-label">Cupo Máximo:</label>
            <input type="number" class="form-control" id="CupoMaximo" name="CupoMaximo" value="{{ $clase->CupoMaximo }}" required>
        </div>
        <div class="mb-3 form-check form-switch" >
            <input id="activa" name="activa" type="checkbox" class="form-check-input" @if ($clase->activa) checked @endif>
            <label for="activa" class='form-check-label'>Activa</label>
        </div>
    </div>
</form>