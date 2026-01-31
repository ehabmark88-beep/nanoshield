<div>
    <h3>اختيار الوقت و الفرع</h3>
    <h5>من فضلك قم باختيار المنطقة و الفرع</h5>

    <!-- اختيار المنطقة والفرع -->
    <div>
        <label for="governorate">المنطقة:</label>
        <select wire:model="governorate_id" id="governorate">
            <option value="">اختر المحافظة</option>
            @foreach($governorates as $governorate)
                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="branch">الفرع:</label>
        <select wire:model="branch_id" id="branch" {{ empty($branches) ? 'disabled' : '' }}>
            <option value="">اختر الفرع</option>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- عرض أوقات الحجز بناءً على الفرع المختار -->
    <div class="calendar">
        @foreach($bookedTimes as $date => $times)
            <div class="day">
                <div class="day-header">{{ \Carbon\Carbon::parse($date)->format('d') }} <span>{{ \Carbon\Carbon::parse($date)->format('l') }}</span></div>
                @for ($hour = 12; $hour < 22; $hour++)
                    @php
                        $timeString = sprintf('%02d:00', $hour);
                    @endphp
                    <div class="time {{ in_array($timeString, $times) ? 'disabled' : '' }}">
                        {{ $timeString }}
                    </div>
                @endfor
            </div>
        @endforeach
    </div>
</div>
