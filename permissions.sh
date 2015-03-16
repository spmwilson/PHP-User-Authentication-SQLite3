#!/bin/bash

##############################
# Script that modifies directory permissions
# as stated by CS FAQ
# run in the directory you wish to modify
#############################
#first allow script to read everything
chmod -R 711 *
for i in $(find ./ -type d -not -path "*/.svn*")
do
	echo "Modifying permissions for " . $i
	#permissions form http://www.cs.colostate.edu/~info/faq.html#11.01
	#711 for directories
	chmod 711 $i 
	# 644 for regular files (HTML, CSS, images, etc)
	chmod 644 $i/* 2>/dev/null
	chmod 644 $i/.htaccess 2>/dev/null
	# 600 for PHP files
	chmod 600 $i/*.php 2>/dev/null
	
done
