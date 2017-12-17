import urllib.request, urllib.parse
import hashlib
import argparse

parser = argparse.ArgumentParser()
parser.add_argument('--url', help='Example: http://www.mypiweb.com/updateIP.php', default='')
parser.add_argument('--user', help='Your username', default='')
parser.add_argument('--password', help='Your password', default='')
args = parser.parse_args()

data = {'USER' : args.user, 'PASS' : hashlib.md5(args.password.encode('utf-8')).hexdigest()}

if (args.url != ""):
	data = bytes(urllib.parse.urlencode(data).encode())
	handler = urllib.request.urlopen(args.url, data);
