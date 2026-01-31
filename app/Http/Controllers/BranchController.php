<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Branch;
use App\Models\Governorate;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ImageTrait;

    /**
     * عرض قائمة الفروع.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index', compact('branches'));
    }

    /**
     * عرض نموذج إنشاء فرع جديد.
     */
    public function create()
    {
        $governorates = Governorate::all(); // جلب جميع المحافظات
        return view('admin.branches.create', compact('governorates')); // تمرير المحافظات للـ View
    }

    /**
     * تخزين فرع جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
//        return $request;
        if ($request->image){
            $img = $this->saveImage($request->image, 'img/branches');
        }else{
            $img = null;
        }

        Branch::create([
            'branch_name' => $request->branch_name,
            'branch_address' => $request->branch_address,
            'branch_name_ar' => $request->branch_name_ar,
            'branch_address_ar' => $request->branch_address_ar,
            'branch_link' => $request->branch_link,
            'branch_details' => $request->branch_details,
            'governorate_id' => $request->governorate_id, // حفظ الـ ID الخاص بالمحافظة
            'contact_us' => $request->contact_us, // حفظ رابط تواصل معنا
            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.branches.index')->with('success', 'تم إنشاء الفرع بنجاح!');
    }

    /**
     * عرض نموذج تعديل فرع موجود.
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $governorates = Governorate::all(); // جلب جميع المحافظات
        return view('admin.branches.edit', compact('branch', 'governorates')); // تمرير الفروع والمحافظات للـ View
    }

    /**
     * تحديث فرع في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $branch->update([
            'branch_name' => $request->branch_name,
            'branch_address' => $request->branch_address,
            'branch_name_ar' => $request->branch_name_ar,
            'branch_address_ar' => $request->branch_address_ar,
            'branch_link' => $request->branch_link,
            'branch_details' => $request->branch_details,
            'governorate_id' => $request->governorate_id, // تحديث الـ ID الخاص بالمحافظة
            'contact_us' => $request->contact_us, // تحديث رابط تواصل معنا
        ]);

        if (!isset($request->image)) {
            $branch->update([
                'image' => $request->old_image
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/branches');
            $branch->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.branches.index')->with('success', 'تم تعديل الفرع بنجاح!');
    }

    /**
     * حذف فرع من قاعدة البيانات.
     */
    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الفرع بنجاح!');
    }

    public function getBranchesByGovernorate($governorateId)
    {
        $branches = Branch::where('governorate_id', $governorateId)->get();
        return response()->json($branches);
    }

}
