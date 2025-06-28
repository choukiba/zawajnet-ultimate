public function edit($id)
{
    $member = Member::findOrFail($id);
    return view('profile.edit', compact('member'));
}

public function update(Request $request, $id)
{
    $member = Member::findOrFail($id);

    $request->validate([
        'name'           => 'required|string|max:255',
        'age'            => 'required|integer|min:18',
        'country'        => 'required|string|max:100',
        'marriage_type'  => 'nullable|string|max:255',
    ]);

    $member->update($request->only('name', 'age', 'country', 'marriage_type'));

    return redirect()->route('profile.show', $member->id)->with('success', 'تم تحديث الملف بنجاح!');
}
