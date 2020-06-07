def parser(file_name):
    try:
        f = open(str(file_name),'r')
        while True:
            s = f.readline()
            if s == "":
                break
            sw1 = s.find("plain", 0, len(str(s))) != -1
            sw2 = s.find("fs25", 0, len(str(s))) != -1
            sw3 = s.find("fs24", 0, len(str(s))) != -1
            sw4 = s.find("fs22", 0, len(str(s))) != -1
            if sw1 and (sw2 or sw3 or sw4):
                s = f.readline()
                _ = s.find("\\", 0, len(str(s)))
                print(s[:_])
                sss = f.readline()

                s = f.readline()
                _ = s.find("\\", 0, len(str(s)))
                s = s[:_]
                while True:
                    if s != "":
                        print(s)
                        s = f.readline()
                        _ = s.find("\\", 0, len(str(s)))
                        s = s[:_]
                    else:
                        print()
                        break
    finally:
        f.close()
parser("d:\\OpenServer\\OpenServer\\domains\\swamp\\docs\\001.rtf")


keywords = ["Общие положения", "Должностные обязанности", "Права",
            "Ответственность", "Задачи" , "Функции", "Условия работы"]
