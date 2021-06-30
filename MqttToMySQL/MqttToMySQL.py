#!/usr/bin/python3
#import MySQLdb
import pymysql.cursors
import json
import time
from paho.mqtt import client as mqtt_client
import yaml
import sys

with open("config.yaml") as f:
    ENV = yaml.safe_load(f) # 读取配置文件


DBHost = ENV["DBHost"]
DBDatabase = ENV["DBDatabase"]
DBPassword = ENV["DBPassword"]
DBUsername = ENV["DBUsername"]
MQTTBroker = ENV["MQTTBroker"]
MQTTPort = ENV["MQTTPort"]
MQTTTopic = ENV["MQTTTopic"]
MQTTClientID = ENV["MQTTClientID"]


def insertDataToDB(data):
    jsonData = json.loads(data)
    connection = pymysql.connect(host = DBHost,
                             user = DBDatabase,
                             password = DBPassword,
                             database = DBUsername,
                             cursorclass=pymysql.cursors.DictCursor)
    with connection:
        with connection.cursor() as cursor:
            # Create a new record
            for i, item in enumerate(jsonData):
                alert = jsonData["alert"]
                clientId = jsonData["clientId"]
                info = jsonData["info"]
                lat = jsonData["lat"]
                lng = jsonData["lng"]
                timestamp = jsonData["timestamp"]
                value = jsonData["value"]
            sql = "INSERT INTO `datas` (`alert`, `clientId`, `info`, `lat`, `lng`, `timestamp`, `value`) VALUES (%s, %s, %s, %s, %s, %s, %s)"
            cursor.execute(sql, (alert, clientId, info[12:], lat, lng, timestamp, value))
        print("[INFO] Successfully Stored in Database!")
        connection.commit()
        

def connectMQTT():
    def on_connect(client, userdata, flags, rc):
        if rc == 0:
            print("[INFO] Connected to MQTTBroker! Host:{}".format(MQTTBroker))
        else:
            print("[ERROR] Failed to connect, return code %d\n", rc)
    # Set Connecting Client ID
    client = mqtt_client.Client(MQTTClientID)
    client.on_connect = on_connect
    client.connect(MQTTBroker, MQTTPort)
    return client

def publish(client):
    msg_count = 0
    while True:
        time.sleep(1)
        msg = f"messages: {msg_count}"
        result = client.publish(MQTTTopic, msg)
        # result: [0, 1]
        status = result[0]
        if status == 0:
            print(f"[INFO] Send `{msg}` to topic `{MQTTTopic}`")
        else:
            print(f"[ERROR] Failed to send message to topic {MQTTTopic}")
        msg_count += 1

def subscribe(client: mqtt_client):
    def on_message(client, userdata, msg):
        print(f"[DEBUG] Received `{msg.payload.decode()}` from `{msg.topic}` topic")
        #json_obj = json.loads(msg.payload.decode())
        #print(json_obj['alert'])
        insertDataToDB(msg.payload.decode())


    client.subscribe(MQTTTopic)
    client.on_message = on_message

def run():
    client = connectMQTT()
    subscribe(client)
    client.loop_forever()

if __name__ == '__main__':
    run()
