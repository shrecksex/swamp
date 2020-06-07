def parser(file_name = "001.rtf"):
    try:
        f = open(str("C:/opens/OSPanel/domains/swamp/storage/app/public/"+file_name),'r')
        arr1 = []
        arr2 = []
        arr3 = []
        while True:
            s = f.readline()
            if s == "":
                break
            sw1 = s.find("plain", 0, len(str(s))) != -1
            sw2 = s.find("fs25", 0, len(str(s))) != -1
            sw3 = s.find("fs24", 0, len(str(s))) != -1
            sw4 = s.find("fs22", 0, len(str(s))) != -1
            if sw1 and (sw2 or sw3 or sw4):
                key1 = f.readline()
                _ = key1.find("\\", 0, len(str(key1)))
                arr1.append(key1[:_])

                sss = f.readline()

                s = f.readline()
                _ = s.find("\\", 0, len(str(s)))
                s = s[:_]

                while True:
                    if s != "":
                        arr2.append(s)
                        s = f.readline()
                        _ = s.find("\\", 0, len(str(s)))
                        s = s[:_]
                    else:
                        ##print(json.dumps(""))
                        break
            if len(arr2) != 0:
                arr3.append(arr2)
            arr2 = []
    finally:
        arr2 = [arr1, arr3]
        print(json.dumps(arr2))
        f.close()

##keywords = ["Общие положения", "Должностные обязанности", "Права",
##            "Ответственность", "Задачи" , "Функции", "Условия работы"]

import json
import sys

file_name = str(sys.argv[1])
# print(file_name)
parser(file_name)

##if __name__ == "__main__":
##    parser()
##else:
##    file_name = str(sys.argv)
##    parser(file_name)
