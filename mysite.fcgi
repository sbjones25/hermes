#!/home2/jonesvsf/local_usr/bin/python
 
import sys
import os
 
sys.path.insert(0, "/home2/jonesvsf/local_usr/lib/python2.7/site-packages")
sys.path.append("/home2/jonesvsf/public_html/sjonesphoto/mysite")
sys.path.append("/home2/jonesvsf/public_html/sjonesphoto/mysite/mysite")
 
os.environ["DJANGO_SETTINGS_MODULE"] = "mysite.settings"
 
import django.core.handlers.wsgi

application = django.core.handlers.wsgi.WSGIHandler()

from django.core.servers.fastcgi import runfastcgi
runfastcgi(method="threaded", daemonize="false")
