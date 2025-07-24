while True:
    print("[]:::::::::::::::PEMILIHAN TEMA SOAL:::::::::::::::[]")
    print("~~~~~SILAHKAN PILIH TEMA~~~~~")
    print("2.STATISKA (MENENTUKAN MEDIAN)")
    print("5.LISTRIK, MAGNET, DAN SUMBER ENERGI (RESISTOR PAREREL/SERI)")
    print("6.LISTRIK, MAGNET, DAN SUMBER ENERGI ( GAYA COULOMB)")
    print("9.SUHU, KALOR, DAN PEMUAIAN (PERUBAHAN ENERGI PANAS)")
    print("14.USAHA ENERGI DAN PESAWAT SEDERHANA (ENGERGI POTENSIAL/MEKANIK)")
    print("16.SUHU, KALOR, PEMUAIAN KONVERSI SUHU (REAMUR, CELCIUS, KELVIN, FAHRENHEIT")
    print("22.PERSAMAAN LINEAR 2 VARIABEL")
    pilihan = float(input("masukkan pilihan anda = "))

    if (pilihan == 2):
        print ("STATISKA (MENENTUKAN MEDIAN)")
        def urutkan_list(angka_list):
            n = len(angka_list)
            for i in range (n): 
                for j in range(0, n-i-1):
                    if angka_list[j] > angka_list[j+1]:

                            angka_list[j], angka_list[j+1] = angka_list[j+1], angka_list[j]

        def hitung_median(angka_list):
            urutkan_list(angka_list)

            n = len(angka_list)
            if n % 2 == 1:
                median = angka_list[n // 2]
            else:
                median = (angka_list[n // 2 - 1] + angka_list [n // 2]) / 2
            return median

        n = int(input("masukkan jumlah angka:"))
        x = [0] * n
        for i in range(n):
            angka = int(input(f"masukkan angka {i+1} ")) #salah
            x[i] = angka

            print(f"median dari list tersebut adalah: {hitung_median(x)}") #salah
        

    elif (pilihan == 5):
        print("5.LISTRIK, MAGNET, DAN SUMBER ENERGI (RESISTOR PAREREL/SERI)")
        def resistor():
            n = int(input("Masukkan jumlah resistor: "))

            resistors = []
            for i in range(n):
                r = float(input(f"Masukkan nilai resistor {i+1} (ohm): ")) #salah
                resistors.append(r)

        print("Pilih operasi:")
        print("1. Paralel")
        print("2. Seri")

        pilih = input("Pilih (1/2): ")

        if pilih == "1":
                rt = 0
                for r in resistors:
                    rt += 1/r
                rt = 1/rt
                print(f"Resistansi total secara paralel: {rt:.2f} ohm")
        elif pilih == "2":
                rt = 0
                for r in resistors:
                    rt += r
                print(f"Resistansi total secara seri: {rt:.2f} ohm")
        else:
                print("Pilihan tidak valid!")

        resistor()

    elif (pilihan == 6):
        print("6.LISTRIK, MAGNET, DAN SUMBER ENERGI ( GAYA COULOMB)")
        def gaya_coulomb(q1,q2,r):
          f = k * (q1 * q2) / ( r ** 2)
          return f
          q1 = int(input("masukkan nilai q1 (coulomb):"))
          q2 = int(input("masukkan nilai q2 (coulomb):"))
          r = int(input("masukkan jarak r (coulomb):"))
          k = 8.99 * 10 ** 9

        print(f"gaya coulomb antara muatan {q1} c dan {q2} c dengan jarak {r} meter adalah {gaya_coulomb(q1,q2,r)}newton.")
    elif (pilihan == 9):
        print("9.SUHU, KALOR, DAN PEMUAIAN (PERUBAHAN ENERGI PANAS)") 
        def perubahan_energi_panas(m,c,t) :
            Q = m * c * t
        print(Q)
        m = int(input("masukkan nilai m = "))
        c = int(input("masukkan nilai c = "))
        t = int(input("masukkan nilai t = "))
        perubahan_energi_panas(m,c,t)

    elif (pilihan == 14):
        print("14.USAHA ENERGI DAN PESAWAT SEDERHANA (ENGERGI POTENSIAL/MEKANIK)")
        def hitung_daya(w, t):
            #Fungsi untuk menghitung daya (P).
            #P = w / t
            #w: usaha (dalam joule)
            #t: waktu (dalam detik)

            if t == 0:
                return "Waktu tidak boleh nol"
            return w / t

        # Menghitung Energi Kinetik
        def hitung_energi_kinetik(m, v):
        #Fungsi untuk menghitung energi kinetik (Ek).
        # Ek = 0.5 * m * v^2
        # m: massa (dalam kilogram)
        # v: kecepatan (dalam meter per detik)

            return 0.5 * m * v ** 2

        # Input dari pengguna
        usaha = float(input("Masukkan usaha (dalam joule): "))
        waktu = float(input("Masukkan waktu (dalam detik): "))
        massa = float(input("Masukkan massa (dalam kilogram): "))
        kecepatan = float(input("Masukkan kecepatan (dalam meter per detik): "))

        # Menghitung daya dan energi kinetik
        daya = hitung_daya(usaha, waktu)
        energi_kinetik = hitung_energi_kinetik(massa, kecepatan)

        # Menampilkan hasil
        print(f"Daya: {daya} watt")
        print(f"Energi Kinetik: {energi_kinetik} joule")
            

    
    elif (pilihan == 16):
        print("16.SUHU, KALOR, PEMUAIAN KONVERSI SUHU (REAMUR, CELCIUS, KELVIN, FAHRENHEIT")
        #input/masukkan suhu dan satuan asal
        def konversi_suhu(celcius,farenheit,kelvin,reamur) :
            c_ke_f = (celcius * 9/5) + 32
            c_ke_k = celcius + 273.15
            c_ke_r = 4/5 * celcius
            f_ke_c = (f - 32) * 5/9
            F_ke_k = (f - 32) * 5/9 + 273.15
            f_ke_r = (f - 32) * 4/9
            k_ke_c = k - 273.15
            k_ke_f = (k - 273.15) * 9/5 + 32
            k_ke_r = (k - 273.15) * 4/5
            r_ke_c = r * 5/4
            r_ke_f = (r * 9/4) + 32
            r_ke_k = (r * 5/4) + 273.15

        #proses 
            print("celcius ke fanrenheit adalah",c_ke_f,"fanrenheit")
            print("celcius ke kalvin adalah",c_ke_k,"kelvin")
            print("celcius ke reamur adalah",c_ke_r,"reamur")
            print("fanrenheit ke celcius adalah",f_ke_c,"celcius")
            print("fanrenheit ke kelvin adalah",F_ke_k,"kelvin")
            print("fanrenheit ke reamur adalah",f_ke_r,"reamur")
            print("kelvin ke celcius adalah",k_ke_c,"celcius")
            print("kelvin ke fanrenheit adalah",k_ke_f,"fanrenheit")
            print("kelvin ke reamur adalah",k_ke_r,"reamur")
            print("reamur ke celcius adalah",r_ke_c,"celcius")
            print("reamur ke fanrenheit adalah",r_ke_f,"fanrenheit")
            print("reamur ke kelvin adalah",r_ke_k,"kelvin")

        #output
        if konversi_suhu :
                    c = float(input("masukkan celcius = "))
                    f = float(input("masukkan fanrenheit = "))
                    k = float(input("masukkan kelvin = "))
                    r = float(input("masukkan reamur = "))
                    konversi_suhu(c,f,k,r)
                    

       
    elif (pilihan == 22):
        print("22.PERSAMAAN LINEAR 2 VARIABEL")  
        def penyelesaian_linear():   #jika bilangan 0 maka
            print("masukan koefisien untuk 2 persamaan linear dalam bentuk ax + by + c = 0")
            
            a1= float(input("persamaan 1 - masukan a1: "))
            b1= float(input("persamaan 1 - masukan b1: ")) 
            c1= float(input("persamaan 1 - masukan c1: ")) 
            
            a2= float(input("persamaan 2 - Masukan a2: "))
            b2= float(input("persamaan 2 - Masukan b2: ")) 
            c2= float(input("persamaan 2 - Masukan c2: "))

            c1 = -c1
            c2 = -c2

            faktor = (b2 * a1) - (b1 * a2) 

            if faktor != 0:
                x_numerator = (c1 * a2 - c2 * a1)
                x = x_numerator / faktor

                y_numerator = (c1 - a1 * x)
                y = y_numerator / b1

                print("nilai x:", x)
                print("nilai y:", y)
            else:
                if (c1 * a2 - c2 * a1)== 0:
                    print("Persamaan memiliki banyak solusi (sistem saling bergantung).")
                else:
                    print("persamaan tidak memiliki solusi (sistem bertentangan).")
        penyelesaian_linear()
        
    
            

