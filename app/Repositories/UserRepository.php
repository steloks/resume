<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPetHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserRepository
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function storePetFirstStep(Request $request)
    {
        $pet = Pet::create([
            'user_id'       => auth()->user()->id,
            'breed_id'      => $request->get('breed'),
            'name'          => $request->get('name'),
            'date_of_birth' => Carbon::createFromDate($request->get('date_of_birth'))->format('Y-m-d'),
            'age'           => $request->get('age'),
            'gender'        => $request->get('gender'),
        ]);

        if (\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood']))
        {
            $path = resource_path('data/dog-default.png');
        }else{
            $path = public_path('images\dog-default.png');
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $this->storeImage((!empty($request->get('image')) ? $request->get('image') : ('data:image/' . $type . ';base64,' . base64_encode(file_get_contents($path)))), $pet);

        Session::put('createStep', [2]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function storePetSecondStep(Request $request)
    {
        $pet = Pet::where('user_id', auth()->user()->id)->latest()->first();

        $pet->update([
            'weight'       => $request->get('weight'),
            'weight_lvl'   => $request->get('weight_lvl'),
            'activity_lvl' => $request->get('activity_lvl'),
        ]);


        if ($pet->wasChanged('weight')) {
            $pet->history()->create([
                'key'   => 'weight',
                'value' => $pet->weight,
            ]);
        }

        if ($pet->wasChanged('weight_lvl')) {
            $pet->history()->create([
                'key'   => 'weight_lvl',
                'value' => $pet->weight_lvl,
            ]);
        }

        Session::put('createStep', [3]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function storePetThirdStep(Request $request)
    {
        $pet = Pet::where('user_id', auth()->user()->id)->latest()->first();
        $pet->update([
            'neutered'         => $request->get('neutered'),
            'disease'          => $request->get('disease'),
            'unusual_behavior' => $request->get('unusual_behavior'),
        ]);

        $pet->product_allergens()->sync($request->get('allergens'));
        Session::remove('createStep');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function updatePetFirstStep(Request $request)
    {
        $pet = Pet::firstWhere('id', $request->get('id'));
        $pet->update([
            'user_id'       => auth()->user()->id,
            'breed_id'      => $request->get('breed'),
            'name'          => $request->get('name'),
            'date_of_birth' => Carbon::createFromDate($request->get('date_of_birth'))->format('Y-m-d'),
            'age'           => $request->get('age'),
            'gender'        => $request->get('gender'),
        ]);

        if (!empty($request->get('image'))) {
            Storage::disk('pets')->delete($pet->image);
            $this->storeImage($request->get('image'), $pet);
        } else {
            File::delete($pet->image);
            if (\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood']))
            {
                $path = resource_path('data/dog-default.png');
            }else{
                $path = public_path('images\dog-default.png');
            }

            $type = pathinfo($path, PATHINFO_EXTENSION);
            $this->storeImage((!empty($request->get('image')) ? $request->get('image') : ('data:image/' . $type . ';base64,' . base64_encode(file_get_contents($path)))), $pet);
        }


        Session::put('updateStep', [2]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function updatePetSecondStep(Request $request)
    {
        $pet = Pet::firstWhere('id', $request->get('id'));
        $oldWeight = $pet->weight;
        $oldWeightLvl = $pet->weight_lvl;
        $oldActivityLvl = $pet->activity_lvl;

        $pet->update([
            'weight'       => $request->get('weight'),
            'weight_lvl'   => $request->get('weight_lvl'),
            'activity_lvl' => $request->get('activity_lvl'),
        ]);

        if ($pet->wasChanged('weight')) {
            $pet->history()->create([
                'key'   => 'weight',
                'value' => !$pet->history()->exists() ? $oldWeight :  $pet->weight,
            ]);
        }

        if ($pet->wasChanged('weight_lvl')) {
            $pet->history()->create([
                'key'   => 'weight_lvl',
                'value' => !$pet->history()->exists() ? $oldWeightLvl :  $pet->weight_lvl,
            ]);
        }

        if ($pet->wasChanged('activity_lvl')) {
            $pet->history()->create([
                'key'   => 'activity_lvl',
                'value' => !$pet->history()->exists() ? $oldActivityLvl :  $pet->activity_lvl,
            ]);
        }

        Session::put('updateStep', [3]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function updatePetThirdStep(Request $request)
    {
        $pet = Pet::query()->with(['history'])->firstWhere('id', $request->get('id'));
        $oldNeutered = $pet->neutered;
        $oldDisease = $pet->disease;
        $oldUnusualBehavior = $pet->unusual_behavior;
        $oldAllergens = $pet->product_allergens()->get()->pluck('id')->toArray();

        $pet->update([
            'neutered'         => $request->get('neutered'),
            'disease'          => $request->get('disease'),
            'unusual_behavior' => $request->get('unusual_behavior'),
        ]);

        if ($pet->wasChanged('neutered')) {
            $pet->history()->create([
                'key'   => 'neutered',
                'value' => !$pet->history()->exists() ? $oldNeutered :  $pet->neutered,
            ]);

        }
        if ($pet->wasChanged('disease')) {
            $pet->history()->create([
                'key'   => 'disease',
                'value' => !$pet->history()->exists() ? $oldDisease :  $pet->disease,
            ]);

        }
        if ($pet->wasChanged('unusual_behavior')) {
            $pet->history()->create([
                'key'   => 'unusual_behavior',
                'value' => !$pet->history()->exists() ? $oldUnusualBehavior :  $pet->unusual_behavior,
            ]);

        }
        $pet->product_allergens()->sync($request->get('allergens'));

        if (!empty($request->get('allergens'))) {
            $diff = array_diff($request->get('allergens'),
                $pet->history->where('key', 'allergen_ids')->pluck('value')->map(function ($s) {
                    if (Str::contains($s, ',')) {
                        return explode(',',Str::remove(['[', '"', ']'], $s));
                    } else {
                        return Str::remove(['[', '"', ']'], $s);
                    }
                })->flatten()->toArray());

            if (!empty($diff)) {
                $pet->history()->create([
                    'key'   => 'allergen_ids',
                    'value' => json_encode(array_values($diff)),
                ]);
            }
        }
        Session::remove('updateStep');
    }

    /**
     * @param                 $file
     * @param \App\Models\Pet $pet
     */
    private function storeImage($file, Pet $pet)
    {

        if (Str::contains($file, ['data', 'image', 'base64'])) {
            $extension  = explode('/', mime_content_type($file))[1];
            $filename   = Pet::PET_IMAGE_PREFIX . $pet->id . "." . $extension;
            $filePath   = ('user_' . auth()->user()->id . '/') . $filename;
            $parsedFile = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file));
            Storage::disk('pets')->put($filePath, $parsedFile);
            $pet->update(['image' => Storage::disk('pets')->path($filePath)]);
        }
    }

    public function updateProfile($request)
    {
        $user = User::firstWhere('id', auth()->user()->id);
        $data = $request->except(['_token', 'password']);

        if ($request->has('password')) {
            $user->update([
                'password' => $request->get('new_password'),
            ]);
        }

        if (!empty($data)) {
            $user->update($data);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function addNewAddress(Request $request): bool
    {
        if ($request->has('profile-edit')) {
            UserAddress::create([
                'user_id'  => auth()->user()->id,
                'postcode' => strtoupper(str_replace(' ', '', $request->get('postcode'))),
                'address'  => $request->get('address'),
            ]);

            return true;
        }

        $request->validate([
            'postcode_modal' => 'required',
            'address_modal'  => 'required',
        ], [
            'postcode' => $request->get('postcode_modal'),
            'address'  => $request->get('address_modal'),
        ]);

        UserAddress::create([
            'user_id'  => auth()->user()->id,
            'postcode' => strtoupper(str_replace(' ', '', $request->get('postcode_modal'))),
            'address'  => $request->get('address_modal'),
        ]);

        return true;
    }

    public function getParsedDates($dates): array
    {
        $parsedDate = [];
        foreach ($dates as $date) {
            $parsedDate[] = Carbon::parse($date)->format('d/m');
        }

        return $parsedDate;
    }
}
