import httplib, urllib
import hashlib
import argparse

parser = argparse.ArgumentParser()
parser.add_argument('--url', help='Example: http://www.mypiweb.com', default='')
parser.add_argument('--file', help='Example: updateIP.php', default='')
parser.add_argument('--user', help='Your username', default='')
parser.add_argument('--password', help='Your password', default='')
args = parser.parse_args()

if (args.url != ""):
	connection = httplib.HTTPConnection(args.url)
	params = urllib.urlencode({"USER":args.user, "PASS":hashlib.md5(args.password).hexdigest()})
	headers = {"Content-type": "application/x-www-form-urlencoded", "Accept": "text/plain"}
	connection.request("POST", "/" + args.file, params, headers)
	response = connection.getresponse()
	data = response.read()
	connection.close()
