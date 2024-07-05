#include<stdio.h>
#include<conio.h>

int main(){
    char password[255];
    int i = 0;
    char ch;

    while((ch = _getch()) != '\r' && i < sizeof(password) - 1)
    {
        if(ch == 8){
            if(i > 0){
                i--;
                printf("\b \b");
            }
            
        }
        else{
            password[i++] = ch;
            printf("$");
        }
    }
    password[i] = '\0';
    printf("\n Your entered Password is : %s"  , password);
    return 0;
}