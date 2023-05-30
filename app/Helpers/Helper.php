<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

if (!function_exists('getMenusDate')) {
    function getMenusDate()
    {
        $now = Carbon::now();
        $start = Carbon::createFromTimeString('16:00');
        $end = Carbon::createFromTimeString('23:59');

        if ($now->between($start, $end)) {
            return Carbon::today()->addDay(1);
        }

        return Carbon::today();
    }
}

if (!function_exists('activeRouteClass')) {
    function activeRouteClass($name = null): string
    {
        if (Str::contains(Route::currentRouteName(), $name)) {
            return 'active';
        }

        return '';
    }
}

if (!function_exists('parseTimeslot')) {
    function parseTimeslot($timeslot): string
    {
        return Carbon::create($timeslot)->format('H:i');
    }
}

if (!function_exists('checkAllergen')) {
    function checkAllergen($allergen = null, $allergenId = null): string
    {
        if (!empty($allergen) && !empty($allergenId)) {
            if ($allergen->id == $allergenId) {
                return 'checked';
            }
        }

        return '';
    }
}

if (!function_exists('parseDate')) {
    function parseDate($date, $diary = null): string
    {
        if (!$date) {
            return '';
        }

        if ($diary) {
            return \Illuminate\Support\Carbon::parse($date)->format('d M Y H:i');
        }
        return \Illuminate\Support\Carbon::parse($date)->format(\App\Models\CompanyInfo::first()->date_format ?? 'd/m/Y');
    }
}

if (!function_exists('loggedUser')) {
    function loggedUser(): string
    {
        $user = Auth::guard('admin')->user();

        return $user->name . ' ' . $user->last_name;
    }
}

if (!function_exists('parseEditRoute')) {
    function parseEditRoute($prefix, $id, $name, $asIcon = null, $moduleName = null): string
    {
        if ($asIcon) {
            if ($moduleName) {
                $access = checkAccess($moduleName, 'create_edit');
                if (!$access) {
                    return '';
                }
            }

            return '<a href="' . route('admin.' . $prefix . '.edit.view', ['id' => $id]) . '" style="color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                     </a>';
        }

        if ($moduleName) {
            $access = checkAccess($moduleName, 'view');
            if (!$access) {
                return $name;
            }
        }

        return '<a href="' . route('admin.' . $prefix . '.edit.view', ['id' => $id]) . '">' . $name . '</a>';
    }
}

if (!function_exists('parseDeleteButton')) {
    function parseDeleteButton($prefix, $id): string
    {
        return '<button class="deleteElementDataTable" data-route="' . route('admin.' . $prefix . '.delete', ['id' => $id]) . '">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                     </svg></button>';
    }
}

if (!function_exists('parseId')) {
    function parseId($id): string
    {
        if (!$id) {
            return '';
        }

        return $id <= 9 ? 0 . $id : $id;
    }
}

if (!function_exists('parseFrontViewRoute')) {
    function parseFrontViewRoute($prefix, $id, $name): string
    {
        return '<a href="' . route($prefix, ['id' => $id]) . '">' . $name . '</a>';
    }
}

if (!function_exists('renderInput')) {
    function renderInput($type, $class, $id, $name, $style, $value): string
    {
        return '<input type="' . $type . '" class="' . $class . '" id="' . $id . '" name="' . $name . '" value="' .
            old("'.$name.'", $value ?? '') . '" style="' . $style . '">';
    }
}

if (!function_exists('renderTimeslotSelect')) {
    function renderTimeslotSelect($class, $id, $name, $style, $value, $item, $relation, $areaId): string
    {
        $options = '';
        if (!empty($item->{$relation})) {
            foreach ($item->{$relation}->where('area_id', $areaId)->get() as $timeslot) {
                $options .= '<option value="' . $timeslot->id . '" ' . (($timeslot->id == $value) ? 'selected' : '') .
                    '>' . $timeslot->start_at . '-' . $timeslot->end_at . '</option>';
            }
        }

        return '<select class="' . $class . '" id="' . $id . '" name="' . $name . '" style="' . $style . '">' .
            $options . '</select>';
    }
}

if (!function_exists('parsePrice')) {
    function parsePrice($price): string
    {
        return '&#163;' . round($price, 2);
    }
}

if (!function_exists('dateToYearsAndMonths')) {
    function dateToYearsAndMonths($date): string
    {
        return \Illuminate\Support\Carbon::createFromDate($date)
            ->diff(\Illuminate\Support\Carbon::now())
            ->format('%y years and ' . '%m months');
    }
}

if (!function_exists('parseDeleteRoute')) {
    function parseDeleteRoute($prefix, $id, $name, $asIcon = null, $moduleName = null): string
    {
        if ($moduleName) {
            $access = checkAccess($moduleName, 'delete');
            if (!$access) {
                return '';
            }
        }

        if ($asIcon) {
            $onClickTxt = "'" . __('Are you sure?') . "'";
            return '<a href="' . route('admin.' . $prefix . '.delete', ['id' => $id]) . '" style="color: black" class="pl-md-3 pl-lg-3"
                        onclick="return confirm(' . $onClickTxt . ')">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                     </svg>
                     </a>';
        }

        return '<a href="' . route('admin.' . $prefix . '.delete', ['id' => $id]) . '">' . $name . '</a>';
    }
}

if (!function_exists('parseDetailRoute')) {
    function parseDetailRoute($prefix, $id, $name, $moduleName = null): string
    {
        if ($moduleName) {
            $access = checkAccess($moduleName, 'view');
            if (!$access) {
                return $name;
            }
        }

        return '<a href="' . route('admin.' . $prefix . '.show.view', ['id' => $id]) . '">' . $name . '</a>';
    }
}

if (!function_exists('diaryNotification')) {
    /**
     * @param $pets
     */
    function diaryNotification($pets): void
    {
        foreach ($pets as $pet) {
            if (Carbon::createFromDate($pet->date_of_birth)->diffInMonths(Carbon::now()) > 15) {
                if (!empty($pet->where('weight_notification', '=', null)->first())) {
                    $pet->where('weight_notification', '=', null)->first()->update(['weight_notification' => 'new']);
                    notifications('pet', $pet->id);
                }
            }
        }
    }
}

if (!function_exists('parseWeightLvl')) {
    function parseWeightLvl($pet, $weightLvls): array
    {
        $parsed = [];
        foreach ($weightLvls as $weightLvl) {
            //losho mi e
//            if ($weightLvl != $pet->weight_lvl) {
                $parsed[] = ucfirst($pet->name) . 's ' . __('weight level has been changed from') . ' ' . \App\Models\UserPetHistory::$weightLvl[$weightLvl] . ' ' . __('to') . ' ' . \App\Models\Pet::$weightLvl[$pet->weight_lvl];
//            }
        }
        return $parsed;
    }
}


if (!function_exists('petWeightLvlShit')) {
    function petWeightLvlShit($pa1, $pa2): array
    {
        $node = [];
        foreach ($pa1 as $key => $value) {
            if (!empty($pa2[$key]))
                $node[] = [
                    'data' => [
                        'x' => $value,
                        'y' => $pa2[$key],
                    ],
                ];
        }

        return array_reverse($node);
    }
}

if (!function_exists('renderRecipes')) {
    function renderRecipes($routeName, $id): string
    {
        return '<a href="javascript:void(0)" style="color: black" class="pl-3 js-show-order-menus" data-url="' . route($routeName, ['id' => $id]) . '">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"/>
                      </svg>
                     </a>';
    }
}

if (!function_exists('getBlogImg')) {
    function getBlogImg($string): string
    {
        $img = '';
        if (preg_match_all('@src="(.*)"@mi', $string, $matches)) {
            if (!empty($matches[1]) && !empty($matches[1][0])) {
                return $matches[1][0];
            }
        }
        return $img;
    }
}

if (!function_exists('parseNumber')) {
    function parseNumber($number): string
    {
        return number_format($number, 2, '.', '');
    }
}

if (!function_exists('checkAccess')) {
    function checkAccess($moduleName, $type): bool
    {
        foreach (Auth::guard('admin')->user()->roles as $role) {
            if (optional(optional($role->modules->whereIn('name', is_array($moduleName) ? $moduleName : [$moduleName])->first())->pivot)->{$type}) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('badgeColor')) {
    function badgeColor($statusName): string
    {
        return $statusName == 'Cancelled' ? 'badge-label-red' :
            ($statusName == 'Partially cancelled' ? 'badge-label-blue' :
                'badge-label-green');
    }
}

if (!function_exists('notifications')) {
    function notifications($type, $typeId): void
    {
        \App\Models\Notification::query()->updateOrCreate([
            'type_id' => $typeId,
            'checked' => 0,
        ], [
            'type' => $type,
        ]);
    }
}


if (!function_exists('getAdminNotifications')) {
    /**
     * @return \Illuminate\Support\Collection
     */
    function getAdminNotifications(): \Illuminate\Support\Collection
    {
        $orderNotifications = \App\Models\Notification::query()->where('type', 'order')->orWhere('type', 'order_menu')->with(['order', 'orderMenu'])->orderBy('id', 'DESC')->get();
        $petNotifications = \App\Models\Notification::query()->where('type', 'pet')->with(['pet', 'pet.history' => function($q) {
            $q->where('key', 'weight_lvl');
        }])->orderBy('id', 'DESC')->get();

        return $orderNotifications->merge($petNotifications);

    }


}
if (!function_exists('createHash')) {
    /**
     * @param $chargetotal
     * @param $currency
     *
     * @return string
     */
    function createHash($chargetotal, $currency): string
    {
        $storeId = "2220540850";
        $sharedSecret = "e6%*RH2gzi";
        $stringToHash = $storeId. date('Y-m-d H:i:s') . $chargetotal. $currency . $sharedSecret;
        $ascii = bin2hex($stringToHash);
        return hash("sha256", $ascii);

    }
}
