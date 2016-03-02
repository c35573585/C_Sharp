using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Strings
{
    class Program
    {
        static void Main(string[] args)
        {
            //string myString = "Go to ur c:\\ drive";//Output: c:\ drive
            //string myString = "My \"so called\" life";//Output: My "so called" life
            /*
            string myString = "What if I need \n a new line?";
            //Output: What if I need
            // a new line?
             */

            //string myString = string.Format("{0}!", "Bonzai");//Output: Bonzai!
            //string myString = string.Format("Make: {0} (Model: {1})", "BMW", "760li");//Output: Make: BMW (Model: 760li)
            //string myString = string.Format("{0:C}", 123.45);//Output: NT$123.45
            //string myString = string.Format("{0:N}", 123456789);//Output: 123.456.789.00
            //string myString = string.Format("{0:P}", .123);//Output: 12.30%
            //string myString = string.Format("Phone number: {0:(###) ###-####}", 1234567890);//Output: Phone number: (123) 456-7890
            /*
            string myString = "";
            for (int i = 0; i < 100; i++)
            {
                //myString = myString + "--" + i.ToString();
                myString += "--" + i.ToString();
            }//Output: --0...--99
             */
            /*
            StringBuilder myString = new StringBuilder();
            for (int i = 0; i < 100; i++)
            {
                myString.Append("--");
                myString.Append(i);                
            }//Output: --0...--99
            Console.WriteLine(myString);//parameter can use like this: myString.ToString()
             */
            /*
            string myString = "That summer we took threes across the board";
            //myString = myString.Substring(5, 14);//Output: summer we took
            //myString = myString.ToUpper();//Output: THAT SUMMER WE TOOK THREES ACROSS THE BOARD
            //myString = myString.Replace(" ", "--");//Output: That--summer--we--took--threes--across--the--board
             */
            /*
            string myString = " That summer we took threes across the board  ";
            myString = String.Format("Length before: {0} -- After: {1}", myString.Length, myString.Trim().Length);//Output: Length before: 46 -- After: 43
            */
            string myString = string.Format("{2} - {1}", "3", "4", "5");
            Console.WriteLine(myString);
            Console.ReadLine();

        }
    }
}
