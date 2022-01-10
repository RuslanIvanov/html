#!/bin/bash

echo "copy to path: '$1'"
read -p "Yes?" ask

if [ $ask == "Y" ] || [ $ask == "y" ]
then

echo "Copying..."

cp -i ./ParentWindow.htm $1
cp -i ./load_firmware_bpr.php $1
cp -i ./logfirmwarebrp.php $1
cp -i ./upload.html $1
cp -i ./upload_bin.php $1
cp -i ./upload_db.php $1
cp -i ./upload_firmware_bpr.php $1
cp -i ./upload_libs.php $1
cp -i ./upload_modules.php $1

sudo chmod 664 $1/*.html
sudo chmod 664 $1/*.htm
sudo chmod 664 $1/*.php

echo "End!"

fi
