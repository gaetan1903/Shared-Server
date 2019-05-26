#!*-* coding: utf8 -*-

from tkinter import * 
from os import system, popen
import tkinter.font as tkFont
import tkinter.messagebox as tkmsg
import subprocess

class Fenetre:
    def __init__(self):
        self.root = Tk()
        self.root.title("Shared-server Connector")
        self.root.config(bg='white')
        self.root.geometry('300x300+450+100')
        self.root.resizable(width=False, height=False)
        self.arialinfo14 = tkFont.Font(family='Arial', size=14)
        self.user = StringVar()
        self.password = StringVar()
        self.icon0 = PhotoImage(file='icone.png')


    def __corps__(self):
        topnav = Canvas(self.root, bg = '#2ebc4f', width = 300, height = 30, bd = 0, highlightthickness = 0)
        topnav.pack()
        self.icon = self.icon0.subsample(4,4)
        topnav.create_image(15, 15, image = self.icon)
        topnav.create_text(150, 15, text = 'Shared Server', fill = 'white')

        username_txt = Label(self.root, text = "Nom d'utilisateur", bg = 'white', font = self.arialinfo14).place(relx = 0.28, rely = 0.15)
        username_ent = Entry(self.root, textvariable = self.user, width = 30)
        username_ent.place(relx = 0.14, rely = 0.25)

        pass_txt = Label(self.root, text = "Mot de passe", bg = 'white', font = self.arialinfo14).place(relx = 0.27, rely = 0.4)
        pass_ent = Entry(self.root, textvariable = self.password, width = 30, show  ='*')
        pass_ent.place(relx = 0.14, rely = 0.5)

        forgetcan = Canvas(self.root, bg = 'white',  width = 130, height = 15, highlightthickness = 0)
        forgetcan.place(relx = 0.27, rely = 0.6)
        forgetcan.create_text(67, 7, text = 'Mot de passe oublié?', activefill = '#ff6600')

        signupcan = Canvas(self.root, bg = 'white',  width = 125, height = 15, highlightthickness = 0)
        signupcan.place(relx = 0.27, rely = 0.7)
        signupcan.create_text(63, 7, text = 'Créer un compte', activefill = '#ff6600')

        boutton = Button(self.root, text ='Se Connecter', bg = '#ff6600', fg ='white', font = self.arialinfo14, bd = 0, command = self.se_connecter)
        boutton.place(relx = 0.27, rely = 0.8)

    
    def se_connecter(self):
        user = popen( 'ls /media/')
        user = user.read()
        system(f'mkdir /media/{user}/Shared-Server')
        result = popen(f"mount -t cifs -o user={self.user.get()} -o password={self.password} //shared-server.esti.mg/Shared-Server /media/{user}/Shared-Server")
        if result.read() == '':
            tkmsg.showinfo('Info', 'ok')
        else:
            tkmsg.showwarning('Info', result.read())
    
    def __final__(self):
        self.root.mainloop()


if __name__ == '__main__':
    Inter = Fenetre()
    Inter.__corps__()
    Inter.__final__()
