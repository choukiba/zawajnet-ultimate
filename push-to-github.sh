#!/bin/bash

# 1. أدخل بياناتك الشخصية
GITHUB_USERNAME="choukiba"        # ← غيّره إذا لزم
REPO_NAME="zawajnet-ultimate"     # ← غيّره إذا لزم
BRANCH_NAME="main"                # ← أو "master" حسب الفرع المستعمل

# 2. إعداد Git داخل مجلد المشروع
echo "🛠️  جاري تهيئة Git..."
git init
git branch -M $BRANCH_NAME
git remote remove origin 2> /dev/null
git remote add origin https://github.com/$GITHUB_USERNAME/$REPO_NAME.git

# 3. إضافة وتأكيد الملفات
echo "📂 جاري إضافة الملفات..."
git add .
git commit -m "🚀 رفع آخر نسخة من zawajnet-ultimate"

# 4. دفع الملفات إلى GitHub
echo "⬆️ جاري الرفع إلى GitHub..."
git push -u origin $BRANCH_NAME

echo "✅ تم رفع المشروع بنجاح على: https://github.com/$GITHUB_USERNAME/$REPO_NAME"
