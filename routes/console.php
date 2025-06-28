<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('comments:delete-empty')->everyMinute();
