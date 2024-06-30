<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiResponseHelper
{
    /**
     * トランザクションをロールバックし、エラーログを記録し、例外を再スローします。
     *
     * @param \Exception $e 発生した例外
     * @throws \Exception 再スローされた例外
     */
    public static function rollback(\Exception $e)
    {
        DB::rollBack();
        Log::error($e);
        throw $e;
    }
}
