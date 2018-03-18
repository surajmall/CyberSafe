#!/usr/bin/env python

import smtplib

from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
import time
import imaplib
import email



EMAIL_ACCOUNT = "cmshivam01998@gmail.com"
PASSWORD = "accountFORpython"


def mail(str):
    fromaddr = "cmshivam01998@gmail.com"
    toaddr = "vipullohani8@gmail.com"
     
    msg = MIMEMultipart()
     
    msg['From'] = fromaddr
    msg['To'] = toaddr
    msg['Subject'] = "ProjectCms"
     
    body = "Have a look at this Someone has arrived on the gate"+str
     
    msg.attach(MIMEText(body, 'plain'))
     
    filename = "User.jpg"
    attachment = open("/opt/lampp/htdocs/em/User.jpg", "rb")
     
    part = MIMEBase('application', 'octet-stream')
    part.set_payload((attachment).read())
    encoders.encode_base64(part)
    part.add_header('Content-Disposition', "attachment; filename= %s" % filename)
     
    msg.attach(part)
     
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()
    server.login(fromaddr, "accountFORpython")
    text = msg.as_string()
    server.sendmail(fromaddr, toaddr, text)
    print ("mail sent")
    server.quit()


def mail1():
    
    time.sleep(1)
    global count
    mail = imaplib.IMAP4_SSL('imap.gmail.com')
    mail.login(EMAIL_ACCOUNT, PASSWORD)
    mail.list()
    mail.select('inbox')
    result, data = mail.uid('search', None, "UNSEEN") # (ALL/UNSEEN)
    i = len(data[0].split())

    for x in range(i):
        latest_email_uid = data[0].split()[x]
        result, email_data = mail.uid('fetch', latest_email_uid, '(RFC822)')
        raw_email = email_data[0][1]
        raw_email_string = raw_email.decode('utf-8')
        email_message = email.message_from_string(raw_email_string)

        # Header Details
        date_tuple = email.utils.parsedate_tz(email_message['Date'])
        if date_tuple:
            local_date = datetime.datetime.fromtimestamp(email.utils.mktime_tz(date_tuple))
            local_message_date = "%s" %(str(local_date.strftime("%a, %d %b %Y %H:%M:%S")))
        email_from = str(email.header.make_header(email.header.decode_header(email_message['From'])))
        email_to = str(email.header.make_header(email.header.decode_header(email_message['To'])))
        subject = str(email.header.make_header(email.header.decode_header(email_message['Subject'])))

        # Body details
        for part in email_message.walk():
            if part.get_content_type() == "text/plain":
                body = part.get_payload(decode=True)
                #print email_from
                if email_from == "Shivam Kumar <shivam01998@gmail.com>":
                   # print body
                    if(body.startswith('Yes')):
                        tts('Gate is opening , have patience')
                        count = 0
                        break
                    else:
                        count = 0
                        tts ('Sorry You are not allowed to come now')
                        break
            else:
                continue


mail("cms")


    
    
