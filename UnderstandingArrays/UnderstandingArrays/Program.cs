using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UnderstandingArrays
{
    class Program
    {
        static void Main(string[] args)
        {
            /*first declaration of int array 
            int[] numbers = new int[5];

            numbers[0] = 4;
            numbers[1] = 8;
            numbers[2] = 15;
            numbers[3] = 16;
            numbers[4] = 23;
            */

            /*second declaration of int array
            int[] numbers = new int[] { 4, 8, 15, 16, 23 };

            Console.WriteLine(numbers[1].ToString());
             */

            /*declaration of string array
            string[] names = new string[] { "Eddie", "Alex", "Michael", "Devid Lee" };

            foreach (string name in names)
            {
                Console.WriteLine(name);
            }
             */

            string zig = "You can what u want out of life"+
                "if u help enough other people get what they want.";

            char[] charArray = zig.ToCharArray();//string to char
            Array.Reverse(charArray);

            foreach (char zigChar in charArray)
                Console.WriteLine(zigChar);

            Console.ReadLine();
        }
    }
}
