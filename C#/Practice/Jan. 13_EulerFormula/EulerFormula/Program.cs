using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EulerFormula
{
    class Program
    {
        static void Main(string[] args)
        {
            string n = Console.ReadLine();
            int num = Int32.Parse(n);
            int sum = 0;
            for (int i = 0; i < num + 1; i++)
            {
                if ((i % 2) == 1)
                {
                    sum += i;
                }
                else
                {
                    sum -= i;
                }
            }
            Console.WriteLine(sum);
            Console.ReadLine(); 

        }

       /*long Func(long n)
        {
            if (n <= 0)
            {
                Console.WriteLine("Error!");
                return (-1);
            }
            else if (n % 2 == 0)
                return -(n / 2);
            else
                return (n / 2);
        }
        */
    }
}
