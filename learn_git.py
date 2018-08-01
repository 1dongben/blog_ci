class learn_git(object):
    def __init__(self):
        print("666")

    def input(self):
        a = input("请输入")

class look(learn_git):
    def input(self):
        a = input("请输入查看分支")
        if a == "git branch":
            print("good")
        else:
            print("you are wrong")

class build(learn_git):
    def input(self):
        a = input("请输入创建分支")
        if a == "git branch <name>":
            print('good!')
        else:
            print("you are wrong!")
class switch(learn_git):
    def input(self):
        a = input("请输入切换分支")
        if a == "git checkout <name>":
            print("good")
        else:
            print("you are wrong!")
class twice(learn_git):
    def input(self):
        a = input("创建和切换分支")
    if a == "git checkout -b <name>":
        print("good!")
    else:
        print("you are wrong!")
class merge(learn_git):
    def input(self):
        a == input("合并到当前分支")
    if a == "git merge <name>":
        print("good")
    else:
        print("oh")
class delect(learn_git):
    def input(self):
        a == input("删除分支")
        if a == "git branch -d <name>":
            print("good")
        else:
            print("oh")


def input_t(learn_git):
    learn_git.input()

input_t(look())
input_t(delect())
